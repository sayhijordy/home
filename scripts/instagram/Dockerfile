FROM python:3.8.3-alpine

RUN apk add --update --no-cache py3-numpy jpeg-dev zlib-dev gcc musl-dev
ENV PYTHONPATH=/usr/lib/python3.8/site-packages

WORKDIR /instagram-scraper

COPY setup.py /instagram-scraper/setup.py
COPY docker_entrypoint.sh /instagram-scraper/docker_entrypoint.sh
COPY instagram_scraper /instagram-scraper/instagram_scraper

ENTRYPOINT ["/instagram-scraper/docker_entrypoint.sh"]

RUN python /instagram-scraper/setup.py install && rm -rf instagram_scraper.egg-info
