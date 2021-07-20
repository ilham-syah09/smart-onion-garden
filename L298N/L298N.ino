#include <Arduino.h>
//library http get
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

//library bot telegram
#include "CTBot.h"
//library motor stepper
#include <Stepper.h>

#define USE_SERIAL Serial
ESP8266WiFiMulti WiFiMulti;
HTTPClient http;

CTBot myBot;

String ssid = "admin";
String pass = "12345678";
String token = "1861406766:AAF9ldwPDgZTXTxmdHzr-XuvyuVdilG5YHw";
const int id = 665475263;
const int stepsPerRevolution = 360;
Stepper myStepper(stepsPerRevolution, D5, D6, D7, D8);

#define pompa D1

unsigned long interval = 60000;
unsigned long previousMillis = 1000;

String simpan = "http://monitoring-bawang.xyz/Data/save?value_ph=";
String respon;
String keterangan;

void setup(){
  Serial.begin(115200);
  Serial.println("Starting TelegramBot...");
  myBot.wifiConnect(ssid, pass);
  myBot.setTelegramToken(token);

  if (myBot.testConnection()) {
    Serial.println("Koneksi Bagus");
  } else {
    Serial.println("Koneksi Jelek");
  }
  
  USE_SERIAL.begin(115200);
  USE_SERIAL.setDebugOutput(false);

  for(uint8_t t = 3; t > 0; t--){
    USE_SERIAL.printf("[SETUP] Tunggu %d...\n",t);
    USE_SERIAL.flush();
    delay(1000);
  }

  WiFi.mode(WIFI_STA);
  WiFiMulti.addAP("admin", "12345678");

//cek koneksi wifi
  for (int u = 1; u <= 5; u++)
  {
    if((WiFiMulti.run() == WL_CONNECTED))
    {
      USE_SERIAL.println("Wifi Connected");
      USE_SERIAL.flush();
      delay(1000);
    }
    else
    {
      Serial.println("Wifi Disconnected");
      delay(1000);
    }
  }
  myStepper.setSpeed(50);
  Serial.print("IP Address : ");
  Serial.println(WiFi.localIP());
  pinMode(A0, OUTPUT);
  pinMode(pompa, OUTPUT);
}

void loop(){
  telegram();
  unsigned long currentMillis = millis();
  int value_ph = analogRead(A0);
  Serial.println(value_ph);
  if(value_ph > 500){
    Serial.println("pompa menyala");
    //    menjalankan pompa
    digitalWrite(pompa, HIGH);
    keterangan="menyiram";

    // menjalankan motor stepper
    for(int i=0; i<13; i++){
      Serial.println("clockwise");
      myStepper.step(stepsPerRevolution);
      delay(500);  
    }
      // step one revolution in the other direction:
    for(int i=0; i<13; i++){
      Serial.println("counterclockwise");
      myStepper.step(-stepsPerRevolution);
      delay(500);  
    }
  }
  else{
    Serial.println("pompa mati");
    digitalWrite(pompa, LOW);
    keterangan="tidak%20menyiram";
  }
  if((unsigned long) (currentMillis - previousMillis) >= interval){
    Serial.println(value_ph);
    if ((WiFiMulti.run() == WL_CONNECTED))
  {
    http.begin(simpan + (String) value_ph + "&keterangan=" + (String)keterangan);

    USE_SERIAL.print("[HTTP] menyimpan ke database ...\n");
    int httpCode = http.GET();

    if(httpCode > 0)
    {
      USE_SERIAL.printf("[HTTP] kode response GET : %d\n", httpCode);

      if(httpCode == HTTP_CODE_OK)
      {
        respon = http.getString();
        USE_SERIAL.println("Respon : " + respon);
        delay(200);
      }
    }
    else
    {
      USE_SERIAL.printf("[HTTP] Simpan data gagal, error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end();
  }
    previousMillis = millis();
  }
  delay(1000);
}

void telegram(){
  TBMessage msg;
  if (myBot.getNewMessage(msg))
  {
    if (msg.text.equalsIgnoreCase("on"))
    {
      Serial.println("Relay menyala");
      digitalWrite(pompa, HIGH);
      for(int i=0; i<13; i++){
        Serial.println("clockwise");
        myStepper.step(stepsPerRevolution);
        delay(500);  
      }
      // step one revolution in the other direction:
      for(int i=0; i<13; i++){
        Serial.println("counterclockwise");
        myStepper.step(-stepsPerRevolution);
        delay(500);  
      }
      myBot.sendMessage(msg.sender.id, "MENYIRAM");
    }
    else if (msg.text.equalsIgnoreCase("off"))
    {
      digitalWrite(pompa, LOW);
      myBot.sendMessage(msg.sender.id, "TIDAK MENYIRAM");
    }
    else 
    {
      String reply;
      reply = (String)"Welcome " + msg.sender.username + (String)". ON/OFF UNTUK KONTROL LAMPU DAN SUHU UNTUK MONITOR SUHU.";
      myBot.sendMessage(msg.sender.id, reply);             // and send it
    }
  }
  delay(1000);
}
