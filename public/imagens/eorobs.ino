                  
// Definindo os pinos do sensor ultrassônico
const int trigPin = 8; // Pino do trigger do sensor ultrassônico conectado à porta digital 9
const int echoPin = 9; // Pino do echo do sensor ultrassônico conectado à porta digital 10

// Definindo os pinos do sensor infravermelho
const int sensorDir = 2; // Sensor direito conectado à porta digital 2
const int sensorEsq = 3; // Sensor esquerdo conectado à porta digital 3

// Definindo os pinos do motor
const int motorDirA = 6; // Motor direito conectado à porta digital 6
const int motorDirB = 5; // Motor direito conectado à porta digital 5
const int motorEsqA = 10; // Motor esquerdo conectado à porta digital 10
const int motorEsqB = 11; // Motor esquerdo conectado à porta digital 11


const int velMin = 48 ;
const int velMax = 50; //
const int desv = 60; // Desvio da linha
const int distObstaculo = 14; // Distância mínima para evitar obstáculos em cm

void setup() {

  pinMode(motorDirA, OUTPUT);
  pinMode(motorDirB, OUTPUT);
  pinMode(motorEsqA, OUTPUT);
  pinMode(motorEsqB, OUTPUT);

  pinMode(sensorDir, INPUT);
  pinMode(sensorEsq, INPUT);
  

  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);

   Serial.begin(9600);
   
}

void loop() {
  int distancia = medirDistancia(); // Medindo a distância do obstáculo
  int leituraDir = digitalRead(sensorDir); // Lendo o sensor direito
  int leituraEsq = digitalRead(sensorEsq); // Lendo o sensor esquerdo
  
  int contador = 0;
  int contObstaculo = 0;
  testarSensor();
  imprimirVelocidadeMin();
  // Verificando a distância do obstáculo
  if(distancia < distObstaculo){
    evitarObstaculo(leituraDir, leituraEsq);
  }else{
  
   		// os dois estão sobre a linha siga em frente
      if (leituraDir == HIGH && leituraEsq == HIGH) {
         moverFrente(velMax);
      }

     else if (leituraDir = HIGH && leituraEsq == LOW) {
        // Apenas o sensor direito está sobre a linha(vire a esquerda)
        moverDir(velMin, velMax);   
        contador++;
      }

    else  if (leituraDir == LOW && leituraEsq == HIGH ) {
        // Apenas o sensor esquerdo está sobre a linha(vire a direita)
        moverEsq(velMin, velMax);
        contador++;
      }

    else  if(leituraDir == LOW && leituraEsq == LOW){
        parar();
        delay(200);
        moverFrente(85); 
      }  
  }
}

   
void moverFrente(int vel) {
    analogWrite(motorDirA, vel);
    analogWrite(motorDirB, 0);
    analogWrite(motorEsqA, vel);
    analogWrite(motorEsqB, 0);
}

void moverTras(int vel) {
    analogWrite(motorDirA, 0);
    analogWrite(motorDirB, vel);
    analogWrite(motorEsqA, 0);
    analogWrite(motorEsqB, vel);
}

void moverDir(int velMin, int velMax) {
  analogWrite(motorDirA, velMin);
  analogWrite(motorDirB, 0);
  analogWrite(motorEsqA, 0);
  analogWrite(motorEsqB, velMax);
}

void moverEsq(int velMin, int velMax) {
  analogWrite(motorDirA, 0);
  analogWrite(motorDirB, velMin);
  analogWrite(motorEsqA, velMax);
  analogWrite(motorEsqB, 0);
}

void parar() {
  analogWrite(motorDirA, 0);
  analogWrite(motorDirB, 0);
  analogWrite(motorEsqA, 0);
  analogWrite(motorEsqB, 0);
}

int medirDistancia() {
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  long duration = pulseIn(echoPin, HIGH);

  int distance = duration * 0.034 / 2;

  return distance;
}

bool detectarObstaculo() {
  int distancia = medirDistancia(); // Medindo a distância do obstáculo
  
  // Verificar se a distância do obstáculo é menor que o valor limite
  if (distancia < distObstaculo) {
    return true; // Obstáculo detectado
  } else {
    return false; // Sem obstáculo
  }
}

void evitarObstaculo(int leituraEsq, int leituraDir) {
  int velMin = 49;
  int velMax = 53;

  moverTras(velMax);
  delay(340);
  parar();
  delay(220);
  moverEsq(velMin, velMax);
  delay(270);
  parar();
  delay(220);
  moverFrente(velMax);
  delay(540);
  parar();
  delay(220);
  moverDir(velMin, velMax);
  delay(260);
  parar();
  delay(220);
  moverFrente(velMax);
  delay(520);
  parar();
  delay(220);
  moverDir(velMin, velMax);
  delay(240);
  parar();
  delay(200);

  leituraDir = digitalRead(sensorDir); // Lendo o sensor direito
  leituraEsq = digitalRead(sensorEsq); 
  
  while(leituraDir == HIGH && leituraEsq == HIGH){
    leituraDir = digitalRead(sensorDir); // Lendo o sensor direito
    leituraEsq = digitalRead(sensorEsq); 

    moverFrente(60);
    delay(120);
    parar();
    delay(220);

  }
  
    moverEsq(velMin,velMax);
    delay(230);
    parar();
    delay(200);
    return;
}

bool encontrarLinhaCentral() {
  int leituraDir = digitalRead(sensorDir); // Lendo o sensor direito
  int leituraEsq = digitalRead(sensorEsq); // Lendo o sensor esquerdo
  
  // Verificar se ambos os sensores estão lendo um valor alto (linha central)
  if (leituraDir == LOW && leituraEsq == LOW) {
    return true; // Encontrou a linha central
  } else {
    return false; // Ainda não encontrou a linha central
  }
}

void girarDir(int angulo) {
  // Definir a direção de rotação do robô para a direita
  digitalWrite(motorDirA, LOW);
  digitalWrite(motorDirB, HIGH);
  digitalWrite(motorEsqA, HIGH);
  digitalWrite(motorEsqB, LOW);

  // Implementar a lógica para girar o robô para a direita por um determinado ângulo
  delay(angulo * 1);
  
  // Parar o movimento do robô
  parar();
}

void girarEsq(int angulo) {
  // Definir a direção de rotação do robô para a esquerda
  digitalWrite(motorDirA, HIGH);
  digitalWrite(motorDirB, LOW);
  digitalWrite(motorEsqA, LOW);
  digitalWrite(motorEsqB, HIGH);

  // Implementar a lógica para girar o robô para a esquerda por um determinado ângulo
  delay(angulo * 1);
  
  // Parar o movimento do robô
  parar();
}

void testarSensor() {
  int distancia = medirDistancia();
  Serial.print("Distancia: ");
  Serial.print(distancia);
  Serial.println(" cm");
}
void imprimirVelocidadeMin() {
  Serial.println(velMin);
}