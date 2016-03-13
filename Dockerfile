FROM debian

MAINTAINER Fabio Huser <fabio@fh1.ch>

EXPOSE 80

RUN apt-get update
RUN apt-get install -y curl \
  php5 \
  apache2 \
  git \
  libspreadsheet-writeexcel-perl \
  libdbd-sqlite3-perl \
  libmxml-dev \
  curl \
  libxml2-dev \
  libcunit1-dev \
  build-essential \
  libtext-template-perl \
  subversion \
  rpm \
  librpm-dev \
  libpq-dev \
  libmagic-dev \
  libglib2.0 \
  libboost-regex-dev \
  libboost-program-options-dev

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /fossology
ADD . .

RUN cd src/ && composer install
RUN make install

RUN /etc/init.d/apache2 stop
RUN cp /fossology/install/src-install-apache-example.conf /etc/apache2/conf-available/fossology.conf
RUN ln -s ../conf-available/fossology.conf /etc/apache2/conf-enabled/fossology.conf

RUN echo 'dbname=fossology;host=db;user=fossy;password=fossy;port=5432' > /usr/local/etc/fossology/Db.conf
