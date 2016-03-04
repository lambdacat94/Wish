## 许愿墙项目
* 实现了前台 JavaScript 随机摆放许愿卡
* 实现了后台管理批量删除
### 数据库脚本
由于这个是使用 phpMyAdmin 创建的数据库，在没有 phpMyAdmin 时可以通过 SQL 脚本创建
由于项目的性质，数据库结构上很简单，只有一个表
```
CREATE DATABASE wish；
CREATE TABLE plugin_wish(
  id INT(8) PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(255),
  content VARCHAR(255),
  bg_id   TINYINT(2) DEFAULT 1,
  sign_id TINYINT(2) DEFAULT 1,
  ip      VARCHAR(15) DEFAULT '0.0.0.0',
  add_time  DATETIME DEFAULT '0000-00-00 00:00:00'
);
```

## 后来进一步的学习得到的经验：
* 将前端 JavaScript 代码从 HTML 标签属性中分离出去，可以减少代码并且减少复杂度，功能便于拓展
* 图片连接在这里是硬编码进去的，应该通过 JavaScript 将其动态引入，也便于扩展
