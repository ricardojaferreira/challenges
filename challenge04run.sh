read -e -p "Date (YYYY-MM-DD HH:MM) or blank for now: " date
docker-compose -f docker/docker-compose.yml exec apache-php php ./challenge04/dateCalculation.php $date

