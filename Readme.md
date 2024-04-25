#Claro Insurance

Es un proyecto generado en Laravel 11 con Sactum

Para probarlo localmente debe seguir los siguientes pasos:

```bash
git clone https://github.com/enlabedev/claro_insurance.git
docker compose -f "docker-compose.yml" up -d --build 
cp .env.example .env
sail php artisan key:generate
sail php artisan migrate --seed
```

Usuario para Admin
admin@example.com
Adm1n$t2024

Usuario para Maestro
teacher@example.com
T3acher$

Se comparte el link de la API Documentada
https://blue-moon-703089.postman.co/workspace/c0ffa7d2-27cd-49c6-ada8-b9bb3c34d954