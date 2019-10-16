<!DOCTYPE html>
<html>
<head>
	<title>授权失败</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
		font-size: 0.9rem;
		padding: 10px 0;
	}
	.prompt {
		color: #999;
		font-size: 0.7rem;
	}
	.icon {
		margin-right: 10px;
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
	button.back {
		margin-top: 10px;
		background-color: #f66452;
  		color: #ffffff;
	}
</style>
</head>
<body>
	<div class="container" id="container">

		<div class="client">
			<img src="https://store2018.muapp.cn/images/auth.png">
			<div>@{{ client_name[0] }}</div>
			<div>@{{ client_name[1] }}</div>
		</div>

		<div class="scope">
			<p>亲爱的{{ $user->mobile }}用户</p>
			<p class="prompt"><span class="fa fa-exclamation-circle icon"></span>{{ $message }}</p>
			<button class="back" @click="back">返回登录</button>
		</div>
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
			},
			back: function () {
				window.location.href = "{!!$back_url!!}"
			}
		}
	})
</script>
</html>