# GCP 部署

0. 切换到项目根目录

1. 构建镜像
```
docker build . -f docker/gcp.dockerfile -t gcr.io/lego-demo/lego-demo-gcp
```

2. 推送到 Registry

```bash
docker push gcr.io/lego-demo/lego-demo-gcp
```
