FROM node:14.21.3-alpine AS base

WORKDIR /var/www

COPY ./package.* ./

RUN npm install

COPY . .

FROM base AS dev

EXPOSE 5173

CMD [ "npm", "run", "dev" ]

FROM base AS build

RUN npm run build

FROM nginx:1.25.1-alpine AS prod
COPY --from=base /var/www/dist /usr/share/nginx/html
COPY ./config/nginx-frontend.conf /etc/nginx/nginx.conf

EXPOSE 80

CMD [ "nginx", "-g", "daemon off;" ]
