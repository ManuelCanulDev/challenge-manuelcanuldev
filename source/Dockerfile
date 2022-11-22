FROM bitnami/laravel


# Install dependenciesopenssl php-common php-curl php-json php-mbstring php-mysql php-xml php-zip
RUN apt-get update && apt-get install -y \
    locales \
    zip \
    vim \
    unzip \
    git \
    curl \
    php7.4-common php7.4-bcmath openssl php7.4-json php7.4-mbstring php7.4-mysql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*


COPY ./start.sh /bin/start.sh

RUN chmod +x /bin/start.sh

WORKDIR /var/www

COPY . .

CMD [ "/bin/start.sh" ]
