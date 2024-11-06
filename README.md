# Tech Hub

**Tech Hub** é um sistema de gerenciamento de ativos de TI desenvolvido para facilitar a organização e o monitoramento de equipamentos como computadores, roteadores, switches, entre outros, durante eventos. O sistema permite o cadastro de eventos, clientes, equipamentos e salas, possibilitando a associação de equipamentos às salas dentro dos eventos.

## Funcionalidades

- **Cadastro de Eventos**: Gerencie eventos e associe equipamentos e salas a cada evento.
- **Cadastro de Clientes**: Mantenha um registro de clientes participantes ou responsáveis pelos eventos.
- **Cadastro de Equipamentos**: Registre e controle equipamentos como computadores, roteadores, switches, etc.
- **Cadastro de Salas**: Crie salas para eventos e associe equipamentos a elas.

## Tecnologias Utilizadas

- **Laravel 9**: Framework PHP utilizado para o desenvolvimento do sistema.
- **Docker Compose**: Ferramenta para criação e gerenciamento de ambientes de contêiner.
- **MySQL**: Banco de dados utilizado para armazenar as informações.
- **Tailwind CSS**: Framework CSS para estilização do front-end.

## Requisitos

- **Docker** e **Docker Compose** instalados na máquina.

## Como Rodar o Projeto

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/tech-hub.git
cd tech-hub
```

### 2. Configure o ambiente
Renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme necessário.
```bash
cp .env.example .env
```

### 3. Suba os contêineres com Docker Compose
```bash
docker compose up -d
```
### 4. Acesse o contêiner da aplicação
```bash
docker exec -it laravel bash
```
### 5. Execute as migrations
```bash
php artisan migrate
```
### 6. Acesse o sistema
Abra o navegador e acesse `http://localhost:8000`.

### Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests.

### Licença
Este projeto está licenciado sob a MIT License.

Feito com ❤️ por [Lucas Lima](https://github.com/lucasltavares).
