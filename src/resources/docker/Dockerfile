FROM golang:1.15-buster AS builder
ENV GO111MODULE=on \
     CGO_ENABLED=1
WORKDIR /build
COPY go.mod .
COPY go.sum .
RUN go mod download
COPY . .
RUN go build -o /dist/tob-api ./tob-api
WORKDIR /dist
RUN ldd /dist/tob-api | tr -s '[:blank:]' '\n' | grep '^/' | \
    xargs -I % sh -c 'mkdir -p $(dirname ./%); cp % ./%;'
RUN mkdir -p lib64 && cp /lib64/ld-linux-x86-64.so.2 lib64/

FROM scratch
COPY --chown=0:0 --from=builder /dist /
COPY --chown=65534 --from=builder /build/resources/config/tob-api.yaml /etc/tob-api.yaml
USER 65534
ENTRYPOINT ["/tob-api"]
