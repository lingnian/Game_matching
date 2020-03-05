
<html>
<head>
  <meta charset="UTF-8">
  <!-- import CSS -->
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="CSS/mystyle.css">
  
  <link rel="icon" href="img/icon2.png" type="x-icon" > 
  <title>Game M</title>
</head>
<body>
  <div id="app">
	<el-container style="background-color: #ede3e7;">
    <el-header style="height: 200px; ">
     <!-- 顶部导航栏 -->
      <el-row style="position: relative;">
      <el-col :span="8" style ="position: relative; top: 100px;left:200px"><el-button @click ="login = true" size="medium" type="primary" plain round icon="el-icon-user">登陆</el-button></el-col>
      <el-col :span="8"><img src="img/icon2.png" class="grid-content"></el-col>
      <el-col :span="8" style ="position: relative; top: 100px;right:200px"><el-button @click ="register = true" size="medium" round type="primary" plain icon="el-icon-edit">注册</el-button></el-col>
    </el-row>
    <el-dialog 
    
    title="欢迎登陆"
    :visible.sync="login"
    width="40%"
    center
    show-close = "false"
    >
    <div style="text-align: center;">
     
      <el-input
        
        style="width: 450px;"
        size = "large"
        autofocus
        maxlength="11"
        placeholder="账号"
        prefix-icon="el-icon-user"
        v-model="inputuser">
      </el-input>
      <el-input show-password = false
        style="width: 450px;"
        minlength = "6"
        maxlength = "12"
        placeholder="密码"
        prefix-icon="el-icon-star-off"
        v-model="inputpass">
      </el-input>
      <br>
      <el-button style="margin-bottom: -25px;" type="text" @click="find">忘记密码?</el-button>
    </div>
    <span slot="footer" class="dialog-footer" >
      
      <el-button @click="login = false">取 消</el-button>
      <el-button type="primary" @click= "confirmlogin">确 定</el-button>
    </span>
  </el-dialog>
  <el-dialog 
    
  title="注册一下"
  :visible.sync="register"
  width="40%"
  center
  show-close = "false"
  >
  <div style="text-align: center;">
   
    <el-input
      
      style="width: 450px;"
      size = "large"
      autofocus
      maxlength="11"
      placeholder="账户"
      prefix-icon="el-icon-user"
      v-model="rinputuser">
    </el-input>
    <el-input show-password
    style="width: 450px;"
      minlength = "6"
      maxlength = "12"rr
      placeholder="密码"
      prefix-icon="el-icon-star-off"
      v-model="rinputpass">
    </el-input>
    <br><br>
    <template>
      <el-radio v-model="gender" label="1" >男</el-radio>
      <el-radio v-model="gender" label="2">女</el-radio>
    </template>
    
  </div>
  <span slot="footer" class="dialog-footer" >
    
    <el-button @click="register = false">取 消</el-button>
    <el-button type="primary" @click="registerconfirm">确 定</el-button>
  </span>
</el-dialog>
    </el-header>
    <el-container>
      <el-aside width="300px" height="300">
        <!-- 侧边导航栏 -->
     
        <el-menu
              default-active="2"
              class="el-menu-vertical-demo"
              @open="handleOpen"
              @close="handleClose"
              background-color="#545c64"
              text-color="#fff"
              active-text-color="#ffd04b">
              <el-submenu index="1">
                <template slot="title">
                  <i class="el-icon-user-solid"></i>
                  <span>用户</span>
                </template>
                <el-menu-item-group>
                  <template slot="title">我的消息</template>
                  <el-menu-item index="1-1" @click = "searchpage = true,fabupage=false,friendpage=false,teampage=false,chatpage=false,setpage=false,detailpage=false">我的对战</el-menu-item>
                  <el-menu-item index="1-2"  @click = "searchpage = false,fabupage=true,friendpage=false,teampage=false,chatpage=false,setpage=false,detailpage=false">我的发布</el-menu-item>
                </el-menu-item-group>
<!--
                <el-menu-item-group title="我的好友">
                  <el-menu-item index="1-3"  @click = "searchpage = false,fabupage=false,friendpage=true,teampage=false,chatpage=false,setpage=false,detailpage=false">好友列表</el-menu-item>
                   <el-menu-item index="1-4"  @click = "searchpage = false,fabupage=false,friendpage=false,teampage=true,chatpage=false,setpage=false,detailpage=false">我的队伍</el-menu-item> 
                </el-menu-item-group>
-->
               
              </el-submenu>
              <el-menu-item index="2" @click = "searchpage = false,fabupage=false,friendpage=false,teampage=false,chatpage=true,setpage=false,detailpage=false">
                <i class="el-icon-service"></i>
                <span slot="title">聊天室</span>
              </el-menu-item>
              <el-menu-item index="3" @click = "searchpage = false,fabupage=false,friendpage=false,teampage=false,chatpage=false,setpage=false,detailpage=true">
                <i class="el-icon-document"></i>
                <span slot="title">用户资料</span>
              </el-menu-item>
              <!-- <el-menu-item index="4" @click = "searchpage = false,fabupage=false,friendpage=false,teampage=false,chatpage=false,setpage=true,detailpage=false">
                <i class="el-icon-setting"></i>
                <span slot="title">设置</span> -->


              </el-menu-item>
            </el-menu>
          </el-col>
        </el-row>
      </el-aside>
      <el-container>
        <el-main v-show = "searchpage">
          <img src="img/vs.png" >
          <el-row :gutter="20" :align="medium">
            <el-col :span="4"  :offset="5"><div> <labe style=" color:#67C23A; font-size: larger;">找一个对局?</label></div></el-col>
            <el-col :span="13" :pull="3"><div >
              <el-input  round type="search" v-model="searchdata" size = "medium" style="width: 400px; margin-right: 10px;" ></el-input>
              <el-button type="primary" circle icon="el-icon-search" @click = "search"></el-button>
            </div></el-col>
          </el-row>
           <el-button type="text" style="border-left:3px solid cornflowerblue;
           border-bottom:1px solid cornflowerblue; font-size: larger; font-weight: bold; margin-bottom: 20px;margin-top: 50px;" > &nbsp对局搜索 </el-button>
            <template>
              <el-table
                :data="searchtable"
                style="width: 100%">
                <el-table-column
                  sortable
                  prop="sdate"
                  label="日期"
                  width="180">
                </el-table-column>
                <el-table-column
                sortable
                  prop="sname"
                  label="房间名"
                  width="180">
                </el-table-column>
                <el-table-column
                  sortable
                  prop="spass"
                  label="房间密码">
                </el-table-column>
                 <el-table-column
                 
                  prop="now"
                  label="现有人数">
                </el-table-column>
                  <el-table-column
                  
                  prop="need"
                  label="需要人数">
                </el-table-column>
                <el-table-column
                fixed="right"
                label="操作"
                width="180">
                <template slot-scope="scope">
                  <el-button @click="" type="primary" plain size="small" @click = "detail">查看</el-button>
                  <el-button type="primary" plain size="small" @click = "play">加入</el-button>
                </template>
              </el-table-column>
              </el-table>
            </template>
           <el-button type="text" style="border-left:3px solid cornflowerblue;
           border-bottom:1px solid cornflowerblue; font-size: larger; font-weight: bold; margin-bottom: 20px;margin-top: 50px;" > &nbsp我的战绩 </el-button>
            <template>
              <el-table
                :data="tableData"
                style="width: 100%">
                <el-table-column
                  sortable
                  prop="date"
                  label="日期"
                  width="180">
                </el-table-column>
                <el-table-column
                sortable
                  prop="name"
                  label="角色"
                  width="180">
                </el-table-column>
                <el-table-column
                  sortable
                  prop="gamename"
                  label="游戏">
                </el-table-column>
                <el-table-column
                fixed="right"
                label="操作"
                width="180">
                <template slot-scope="scope">
                  <el-button @click="" type="primary" plain size="small">查看</el-button>
                  <el-button type="primary" plain size="small">编辑</el-button>
                </template>
              </el-table-column>
              </el-table>
            </template>
      
        </el-main>
        <el-main v-show="fabupage">
          <img src="img/fabu.png" >
           <el-row >
        
             <el-col :offset = "4":span = "8">
              <label style="font-size:medium;">房间名</label>
               <el-input v-model = "ftitle" prefix-icon = "el-icon-mouse"></el-input>

             </el-col>
             <el-col :span = "8">
              <label style="font-size:medium;">房间密码</label>
              <el-input  show-password = false v-model = "fpass" prefix-icon = "el-icon-postcard"></el-input>
              
            </el-col>
           </el-row>
           <el-row>
            <el-col :offset = "5" :span = "6">
          
                <el-date-picker
                  v-model="fdata"
                  type="date"
                  placeholder="选择日期">
                </el-date-picker>
           
            </el-col>
            <el-col :span = "8" :pull = "1">
              <el-time-picker
              v-model="fstarttime"
              :picker-options="{
                selectableRange: '00:00:00 - 23:59:59'
              }"
              placeholder="游戏开始时间">
            </el-time-picker>
            <el-time-picker
            v-model="fendtime"
            :picker-options="{
              selectableRange: '00:00:00 - 23:59:59'
            }"
              placeholder="游戏结束时间">
            </el-time-picker>
            </el-col>
      
           </el-row>
           
           <el-row>
            <el-col :offset = "7":span = "5">
              <span>已有玩家</span>
              <el-input-number v-model="nownum" @change="handleChange" :min="1" :max="10" ></el-input-number>
            </el-col>
            <el-col :span = "5">
              <span>需要玩家</span>
              <el-input-number v-model="neddnum" @change="handleChange" :min="1" :max="10" ></el-input-number>
            </el-col>
            </el-row>
           <el-row>
           <el-col :offset = "9":span = "6">
           <el-button type = "primary" round @click = "fabu">发布</el-button>
           </el-col>

           </el-row>
         
           <el-collapse v-model="activeNames" @change="handleChange" accordion style="width: 70%; margin: auto;border: 2px solid gray;border-radius: 6%;
           border-left: 4px solid gainsboro;  border-right: 4px solid gainsboro;">
            <el-collapse-item title="最近发布" name="1" >
               <template>
              <el-table
                :data="fabutable"
                style="width: 100%">
                <el-table-column
                  sortable
                  prop="ffdate"
                  label="日期"
                  width="180">
                </el-table-column>
                <el-table-column
                sortable
                  prop="ffname"
                  label="房间名"
                  width="180">
                </el-table-column>
                <el-table-column
                  sortable
                  prop="ffpass"
                  label="房间密码">
                </el-table-column>
                 <el-table-column
                 
                  prop="ffnow"
                  label="现有人数">
                </el-table-column>
                  <el-table-column
                  
                  prop="ffneed"
                  label="需要人数">
                </el-table-column>
                <el-table-column
                fixed="right"
                label="操作"
                width="180">
                <template slot-scope="scope">
                  <el-button @click="" type="primary" plain size="small" @click = "fabudetail">查看</el-button>
                
                </template>
              </el-table-column>
              </el-table>
            </template>
            </el-collapse-item>
            <el-collapse-item title="历史发布" name="2" >
             <template>
              <el-table
                :data="lfabutable"
                style="width: 100%">
                <el-table-column
                  sortable
                  prop="ffdate"
                  label="日期"
                  width="180">
                </el-table-column>
                <el-table-column
                sortable
                  prop="ffname"
                  label="房间名"
                  width="180">
                </el-table-column>
                <el-table-column
                  sortable
                  prop="ffpass"
                  label="房间密码">
                </el-table-column>
                 <el-table-column
                 
                  prop="ffnow"
                  label="现有人数">
                </el-table-column>
                  <el-table-column
                  
                  prop="ffneed"
                  label="需要人数">
                </el-table-column>
                <el-table-column
                fixed="right"
                label="操作"
                width="180">
                <template slot-scope="scope">
                  <el-button @click="" type="primary" plain size="small" @click = "fabudetail">查看</el-button>
                
                </template>
              </el-table-column>
              </el-table>
            </template>
            </el-collapse-item>
            <el-collapse-item title="成功组队" name="3">
              <template>
              <el-table
                :data="sfabutable"
                style="width: 100%">
                <el-table-column
                  sortable
                  prop="ffdate"
                  label="日期"
                  width="180">
                </el-table-column>
                <el-table-column
                sortable
                  prop="ffname"
                  label="房间名"
                  width="180">
                </el-table-column>
                <el-table-column
                  sortable
                  prop="ffpass"
                  label="房间密码">
                </el-table-column>
                 <el-table-column
                 
                  prop="ffnow"
                  label="现有人数">
                </el-table-column>
                  <el-table-column
                  
                  prop="ffneed"
                  label="需要人数">
                </el-table-column>
                <el-table-column
                fixed="right"
                label="操作"
                width="180">
                <template slot-scope="scope">
                  <el-button @click="" type="primary" plain size="small" @click = "fabudetail">查看</el-button>
                
                </template>
              </el-table-column>
              </el-table>
            </template>
            </el-collapse-item>
            <el-collapse-item title="失效发布" name="4">
              <template>
              <el-table
                :data="sxfabutable"
                style="width: 90%">
                <el-table-column
                  sortable
                  prop="ffdate"
                  label="日期"
                  width="180">
                </el-table-column>
                <el-table-column
                sortable
                  prop="ffname"
                  label="房间名"
                  width="180">
                </el-table-column>
                <el-table-column
                  sortable
                  prop="ffpass"
                  label="房间密码">
                </el-table-column>
                 <el-table-column
                 
                  prop="ffnow"
                  label="现有人数">
                </el-table-column>
                  <el-table-column
                  
                  prop="ffneed"
                  label="需要人数">
                </el-table-column>
                <el-table-column
                fixed="right"
                label="操作"
                width="180">
                <template slot-scope="scope">
                  <el-button @click="" type="primary" plain size="small" @click = "fabudetail">查看</el-button>
                
                </template>
              </el-table-column>
              </el-table>
            </template>
            </el-collapse-item>
          </el-collapse>

        </el-main>
        <el-main v-show="friendpage">
          <img src="img/friend.png" >
          <template>
            <p style="text-align: center; margin: 0 0 20px">我的好友</p>
            <div style="text-align: center">
              <el-transfer
                style="text-align: left; display: inline-block"
                v-model="value"
                filterable  
                :render-content="filterMethod"
                :titles="['在线好友', '待邀请']"
                :button-texts="['删除待邀请', '添加到邀请']"
                :format="{
                  noChecked: '${total}',
                  hasChecked: '${checked}/${total}'
                }"
                @change="handleChange"
                :data="data">
                <el-button class="transfer-footer" slot="left-footer" size="small">加好友</el-button>
                <el-button class="transfer-footer" slot="right-footer" size="small">一键邀请</el-button>
              </el-transfer>
            </div>
          </template>
        </el-main>
        <el-main v-show="teampage">
          <img src="img/team.png" >

        </el-main>  
        <el-main v-show="chatpage">
        <img src="img/chat.png" >
        <el-card class="box-card" style="margin :auto">
          <div slot="header" class="clearfix">
            <span></span>
          </div>
          <div class="text item" v-for ="text in textone" >
           {{text.mess}}
           </div>
          <el-input type = "text"  v-model = "message"></el-input>
          <el-button style="float: right; padding: 3px 0" type="text" @click = "fasong">发送</el-button>

        </el-card>
        
        </el-main>  
        <el-main v-show="detailpage">
          <img src="img/details.png" >
           <el-row>
              <el-divider style="background-color:blanchedalmond;" content-position="left">我的信息</el-divider></el-row>
         

          <el-row>
            
            <el-col :span="6"><div class="grid-content"> <el-input v-model = "nick" placeholder="昵称"></el-input></div></el-col>
            <el-col :span="6"><div class="grid-content"><el-input v-model = "school" placeholder="学校"></el-input></div></el-col>
            <el-col :span="6"><div class="grid-content"><el-input v-model = "city" placeholder="城市"></el-input></div></el-col>
            <el-col :span="4"><div class="grid-content"><el-button size = "small" type="primary" @click = "ssubmit">提交</el-button></div></el-col>

          </el-row>
          
          <el-avatar src="img/game.png"></el-avatar>
        </el-main>
        <el-main v-show="setpage">
          <img src="img/setting.png" >
        </el-main>

        <el-footer style="height: 50px; text-align: right;">
          <h4>Copyright@zeroteam</h4>
        </el-footer>
      </el-container>
    </el-container>
  </el-container>
</div>
</body>

<script src="js/vue.js"></script>

<script src="js/element.js"></script>
<script src="https://cdn.staticfile.org/vue-resource/1.5.1/vue-resource.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.bootcss.com/qs/6.7.0/qs.min.js"></script>


<script>
  
  new Vue({
    el: '#app',
    
    data(){
      const generateData = _ => {
        const data = [];
        const cities = [];
        const pinyin = [];
        cities.forEach((city, index) => {
          data.push({
            label: city,
            key: index,
            pinyin: pinyin[index]
          });
        });
        return data;
      };
      
      return {
       
        login: false,
        info : null,
        register : false,
		rinputuser :"",
		rinputpass :"",
        gender: "",
        // 数据
        fstarttime :"",
        fendtime :"",
        fdata :"",
        searchdata : "",
        ftitle : "",
        fpass :"",
        nownum : "0",
        neednum:"0",
        value :"",
        message :"",
        data1:generateData(),
        inputuser : "",
        inputpass : "",
		textone : "",
        nick :"",
		  school :"",
		  city : "",
		  
        searchpage : true,
        fabupage : false,
//        setpage : false,
        detailpage : false,
//        friendpage : false,
//        teampage : false,
        chatpage : false,
        filterMethod(query, item) {
          return item.pinyin.indexOf(query) > -1;
        },
        
        tableData: [{
//            date: '2016-05-0a2',
//            name: '小明',
//            gamename: 'LOL'
          },]
		  ,
		  textone:[ ],
		  fabutable :[
			 
		  ],
		   searchtable:[
			 {
//				 sdate:'2019-09-23',
//				 sname : 'room',
//				 spass : '123',
//				 need :  1,
//				 now :   9
				 
			 }
		 ]

      };

    },
    methods : {
		ssubmit :function(){
			alert("ok");
		},
		
		fasong :function(){
			this.textone.push(
			 { mess :  this.message},
			); 
			
			
		},
		handleChange:function(val){
			let self = this;
			
		    axios.post('../php/change.php', Qs.stringify({
			   index : val,
			  
		  }))
    .then(function (res) {
//       alert(res.data[0].roompass);
		
		var i = 0;
		self.fabutable = [];
	    for(;i<res.data.length-1;i++){
		
		self.fabutable.push(
		{
			ffdate : res.data[i].time,
			ffname : res.data[i].roomname,
			ffpass : res.data[i].roompass,
			ffneed :  res.data[i].need,
			ffnow :  res.data[i].now,
		}
			
		);	
		}
         
  })
  .catch(function (error) {
    alert("");
  });
		},
		
		 fabu : function(){
		  axios.post('../php/fabu.php', Qs.stringify({
			  
			  rname : this.ftitle,
			  rpass : this.fpass,
			  rnow : this.nownum,
			  rneed : this.neednum,
			  rdate : this.fdata,
			  rtime : this.fstarttime,
			  retime : this.fendtime
			  
			  
		  }))
    .then(function (res) {
      alert("已发布");
         
  })
  .catch(function (error) {
    alert("一个未知的错误产生了");
  });
		 
		 
		 
	 }	,
	 play : function(){
		  
		 alert("已加入");
		 
		 
	 }	,
		 detail : function(){
		  
		 //显示加入的队友
		 
		 
	 }	,
		
      search : function(){
		  let self = this;
		    axios.post('../php/search.php', Qs.stringify({
			  roomname : self.searchdata,
			  
		  }))
    .then(function (res) {
//       alert(res.data[0].roompass);
	   self.searchtable = [];
	   for(let i = 0; i<res.data.length;i++)
		{
		self.searchtable.push(
		{
			sdate : res.data[i].time,
			sname : res.data[i].roomname,
			spass : res.data[i].roompass,
			need :  res.data[i].need,
			now :  res.data[i].now,
		}
		);		
         }
  })
  .catch(function (error) {
    alert("无此对局");
  });
		  
	  } 
		,
		
      confirmlogin: function() {
		   var self=this;
		  if(self.inputuser === ""|| self.inputpass === ""){
			  alert("请输入");
			  
		  }else{
		  
//		   alert(this.inputuser);
		   axios.post('../php/main.php', Qs.stringify({
			  name : this.inputuser,
			  
		  }))
    .then(function (res) {
//	alert(res.data[0].password);
//	alert(self.inputpass);
    if(res.data[0].password == self.inputpass)
		{
			alert("登陆成功");
			self.login = false;
			//逻辑
			
		}
			  else{
				  alert("账号或密码错误");
			  }
  })
  .catch(function (error) {
    console.log(error);
  });
    
      
}} ,
	  registerconfirm: function() {
		  var self=this;
      
		  if(this.rinputpass === ""|| this.rinputuser === "")
			  {alert("请输入");}
					 else{
		  axios.post('../php/register.php', Qs.stringify({
			  user : this.rinputuser,
			  pass : this.rinputpass,
			  gender : this.gender
			  
		  }))
    .then(function (res) {
         alert("注册完成");
	     self.register = false;
  })
  .catch(function (error) {
    console.log(error);
  });
    
      
} 
   }}

    });
</script>

</html>
