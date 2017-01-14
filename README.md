# WorkerServer

## 目录结构

初始的目录结构如下：

~~~
WorkerServer  服务部署目录
├─app                    应用目录
│  ├─http               http模块目录（可以更改）
│  ├─test               test模块目录
│  │  ├─Server.php     服务运行类
│  │  ├─logic          控制器目录
│  │  └─ ...           更多类库目录
│
├─config                配置目录
│  ├─server.php        服务配置文件
├─runtime               缓存或日记目录
├─system                系统工具目录
├─vendor                第三方类库目录（Composer依赖库）
├─server.php            服务启动文件（命令行运行）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
~~~

### 安装

#### github安装

下载基础代码

1，git clone https://github.com/selden1992/WorkerServer.git

下载compsoer依赖

2，composer update

3，运行server.php

#### composer安装

composer require selden1992/worker-server

