FROM mysql

ENV MYSQL_USER: mysql
ENV MYSQL_PASSWORD: 1
ENV MYSQL_ROOT_PASSWORD: 1

COPY ./mysql-db/databases /var/lib/mysql/
# COPY ./mysql-db/dumps/*.sql /docker-entrypoint-initdb.d/

#CMD mysqld -D FOREGROUND

