FROM node:11.1
COPY server.js /root/

ENV LANG C.UTF-8
ENV TZ Asia/Tokyo

RUN apt-get update && \
    apt-get install -y less zsh git emacs tree

WORKDIR /root

ARG CMD_YARN_VERSION=1.13.0
RUN npm install --global yarn@$CMD_YARN_VERSION && \
    chmod +x /usr/local/bin/yarn

RUN npm install --global @vue/cli @vue/cli-init

RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/robbyrussell/oh-my-zsh/master/tools/install.sh)"