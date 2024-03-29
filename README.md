## 安装
```
//install by composer
composer require Jlzan1314/wxapp-sdk
```
## 用法
#### 配置
```php
// app/bean.php,添加配置,默认使用redis做缓存的,暂时没有其他的缓存支持,没时间弄,等swoft/cache组件官方开发完成,改成官方
'wxApp'   => [
    'class'   => Jlzan1314\WxApp\WxApp::class,
    'appid'=>"appid",
    'secret'=>"appid",
],
```
#### 1. 创建小程序对象
```php
//创建一个小程序对象
$wxApp = bean("wxApp");

```
#### 2. 通过客户端上传的code换取sessionkey
```php
//code 换取 session_key
$wxApp->getSessionKey()->get($code);
```

#### 4. 其他接口的调用
4.1 模板消息相关接口
```php
//从‘小程序’获取一个‘模板消息’单例对象
$templateMsg = $wxApp->getTemplateMsg();
  
//1.获取小程序模板库标题列表
$resArray = $templateMsg->getListFromLib($offset,$count);
    
//2.获取模板库某个模板标题下关键词库
$resArray = $templateMsg->getTempFromLib($id);
    
//3.组合模板并添加至帐号下的个人模板库
$resArray = $templateMsg->add($id,$keyword_id_array);
  
//4.获取帐号下已存在的模板列表
$resArray = $templateMsg->getList($offset,$count);
  
//5.删除帐号下的某个模板
$resArray = $templateMsg->del($template_id);
  
//6.发送模板消息
$resArray = $templateMsg->send($touser,$template_id,$form_id,$data);
  
```
4.2.1 客服消息相关接口
```php
//从‘小程序’获取一个‘客服消息’单例对象
$customMsg = $wxApp->getCustomMsg();
  
//1.发送客服消息 (微信对调用时机和次数都有限制，详情见微信文档)
$resArray = $customMsg->send($touser,$msgtype,$content_array);
  
```
4.2.2 客服消息更新计划：
- [ ] 实现接收客户消息和事件并解密
- [ ] 实现新增临时素材
- [ ] 实现获取临时素材
- [ ] 转发消息
  
4.3 二维码相关接口
```php
//从‘小程序’获取一个‘二维码’单例对象
$qrcode = $wxApp->getQRCode();
  
//1.获取小程序A码
$resArray = $qrcode->getQRCodeA($path,$width=null,$auto_color=null,$line_color=null);
  
//2.获取小程序B码
$resArray = $qrcode->getQRCodeB($scene,$page,$width=null,$auto_color=null,$line_color=null);
  
//3.获取小程序C码(二维码)
$resArray = $qrcode->getQRCodeC($path,$width=null);
  
//注意数量限制 A码+C码：总共10万个 B码：无数量限制
```
4.4 数据统计相关接口
```php
//从‘小程序’获取一个‘数据统计’单例对象
$statistic = $wxApp->getStatistic();
  
//1.获取每日数据概况趋势
$resArray = $statistic->getAbout($date);
  
//2.1 获取每日访问趋势
$resArray = $statistic->getVisitDaily($date);
  
//2.2 获取每周访问趋势
$resArray = $statistic->getVisitWeekly($begin_date,$end_date);
  
//2.3 获取每月访问趋势
$resArray = $statistic->getVisitMonthly($begin_date,$end_date);
  
//3. 获取每日访问分布
$resArray = $statistic->getDistribution($date);
  
//4.1 获取每日访问分布
$resArray = $statistic->getRetainDaily($date);
  
//4.2 获取每周访问分布
$resArray = $statistic->getRetainWeekly($begin_date,$end_date);
  
//4.3 获取每月访问分布
$resArray = $statistic->getRetainMonthly($begin_date,$end_date);
  
//5. 获取每日访问页面
$resArray = $statistic->getPage($date);
  
//6. 获取每日用户画像
$resArray = $statistic->getUserFeature($date);
  
```
## 参考文档
1. 微信小程序文档 https://mp.weixin.qq.com/debug/wxadoc/dev/api/

## 感谢
https://github.com/kulokai/wxApp_wechat_miniapp_sdk
本项目是基于该项目开发的,要支持swoft2,所以改写