# Projeto de Sistema de Gerenciamento de Acomodações e Reservas

## 1. Apresentação do Desenvolvedor

### 1.1 - Samuel Araújo Silveira
Desenvolvedor em formação.

### 1.2 - Estudante do Instituto Federal Baiano
Atualmente, estudante do Instituto Federal Baiano, explorando conceitos de desenvolvimento full-stack e práticas avançadas com Laravel.

## 2. Funcionalidades do Sistema

Este sistema é uma API RESTful desenvolvida com Laravel, destinada ao gerenciamento de acomodações e reservas, permitindo desde a importação de dados até operações CRUD completas e agendamentos automáticos de tarefas.

### 2.1 - Modelagem de Banco de Dados com Migrations do Laravel
- A estrutura do banco de dados é criada utilizando **migrations do Laravel**, o que garante consistência e facilita a manutenção e atualização.
- O diagrama abaixo apresenta a modelagem do banco de dados, incluindo as relações entre hotéis, quartos, reservas, pagamentos e outras entidades.
![diagramaFoco](https://github.com/user-attachments/assets/195f5fe2-f5d0-45da-be4b-f743fb88e8ce)


### 2.2 - Importação de Dados XML por URL e por CRON
- **Importação via URL**: Permite importar dados de arquivos XML (hotéis, quartos, reservas) diretamente a partir de URLs especificadas.
- **Importação Agendada**: Tarefas agendadas com CRON para atualizar os dados automaticamente em intervalos regulares.
- **Importação via Comando Artisan**: O comando abaixo permite importar dados XML diretamente via terminal:
  ```bash
  php artisan app:import-xml


### 2.3 - CRUD de Quartos/Acomodações

API RESTful para gerenciamento completo de quartos e acomodações, incluindo:

- Listagem de todos os quartos.
- Criação de novos quartos.
- Atualização de dados de um quarto específico.
- Remoção de quartos quando necessário.

### 2.4 - POST de Reservas

API para criação de novas reservas com validações de disponibilidade e integridade de dados.

- Permite a especificação de dados como `hotel_id`, `room_id`, `check_in`, `check_out` e `total`, garantindo a consistência das reservas.

### 2.5 - Padrões de Projeto

- **Padrão RESTful**: O projeto adota convenções REST, garantindo uma estrutura coerente e organizada dos endpoints.
- **Organização Modular**: Separação de responsabilidades entre controladores, modelos e agendamento de tarefas, o que facilita a escalabilidade.

## 3. Como Executar o Sistema

### Pré-requisitos

Certifique-se de ter **PHP**, **MySQL** e **Composer** instalados no seu ambiente de desenvolvimento.

### Passo a Passo para Execução

1. **Clone o Repositório**

   ```bash
   git clone https://github.com/Samuel-Araujo-Silveira/foco_samuel
   cd foco_samuel

2. **Deixe as configurações do seu banco de dados dessa forma**

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=foco

DB_USERNAME=root

DB_PASSWORD=1234

3. **php artisan migrate**

4. **php artisan serve**

