<!DOCTYPE html>
<html>
<head>
	<title>授权登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<style type="text/css">
	* {
		box-sizing: border-box;
	}
	html, body {
		margin: 0;
		padding: 0;
		font-size: 16px;
		color: #333;
		font-family: "Helvetica Neue", Helvetica, "PingFang SC", "Hiragino Sans GB", "Microsoft YaHei", Arial, sans-serif;
	}
	.container {
		max-width: 420px;
		margin: 0 auto;
		padding: 0 30px 30px 30px;
	}
	.container img {
		max-width: 80px;
		width: 25%;
	}
	.client {
		padding: 40px 0;
		font-size: 1.1rem;
		text-align: center;
		border-bottom: 1px solid #e6e6e6;
	}
	.client div {
		margin-top: 10px;
	}
	.scope {
		padding: 10px 0;
	}
	.scope ul {
		color: #999;
		font-size: 0.9rem;
		padding: 0 1rem;
	}
	.scope ul li {
		padding: 2px 0;
	}
	button {
		width: 100%;
		height: 45px;
		line-height: 45px;
		font-size: 1.05rem;
		letter-spacing: 1px;
		border: none;
		outline: none;
		border-radius: 5px;
		cursor: pointer;
		margin-bottom: 15px;
	}
	button.submit {
		background-color: #f66452;
  		color: #ffffff;
	}
	button.cancel {
		background: #f8f8f7;
		border: 1px solid #e6e6e6;
	}
</style>
</head>
<body>

	<div class="container" id="container">

		<div class="client">
			<img src="https://store2018.muapp.cn/images/auth.png">
			<div>使用常盘庄帐号登录</div>
		</div>

		<div class="scope">
			<p>【@{{ client_name[0] }}】请求允许授权您的帐户，授权后系统将获得以下权限</p>
			<ul>
				<li>获取您公开的基本信息</li>
			</ul>
		</div>

		<form method="post" action="/store/oauth/authorize">
			{{ csrf_field() }}
			<input type="hidden" name="state" value="{{ $request->state }}">
			<input type="hidden" name="client_id" value="{{ $client->id }}">
			<button class="submit" type="submit">确认授权</button>
		</form>
	</div>
	
</body>

<script src="https://cdn.bootcss.com/vue/2.5.8/vue.min.js"></script>
<script src="https://cdn.bootcss.com/axios/0.17.1/axios.min.js"></script>
<script type="text/javascript">
	  new Vue({
	  	el: '#container',
	  	data: {
	  		client_name: []
	  	},
	  	mounted: function () {
		    this.setClientName()
		},
	  	methods: {
	  		setClientName: function () {
	  			var client_name = "{!!$client->name!!}";
	  			this.client_name = client_name.split('（');
	  			if (this.client_name.length > 1) {
	  				this.client_name[1] = '（' + this.client_name[1];
	  			}
	  			console.log(this.client_name);

	  		}
	  	}
	  })
	</script>
</html>