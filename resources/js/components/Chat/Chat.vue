<template>
<div class="row">
 <div class="col-md-8 col-8">
	<div class="card">
      	<div class="card-header">Messages</div>
      	<div class="card-body">
      		<ul class="list-unstyled" style="height: 300px; overflow-y: scroll" v-chat-scroll>
      		<li class="p-2" v-for="(message, index) in messages" :key="index">     
                  <div>
                        <div><strong>{{ message.user.first}}</strong></div>
                        <div>{{message.message}}</div>
                  </div>
      		</li>
      		</ul>
      	</div>
      	<input 
         	@keydown="sendTypingEvent"
         	@keyup.enter="sendMessage"
         	v-model="newMessage"
         	type="text"  
         	name="message" 
         	placeholder="Enter your message"
         	class="form-control">
	</div>
	<span class="text-muted" v-if="activeUser">{{ activeUser.first }} is typing...</span>
 </div>

 <div class="col-md-4 col-4">
	<div class="card">
			<div class="card-header">active users</div>
	<div class="card-body p-1">
      	<ul>
      		<li class="py-1 list-unstyled" v-for="(user, index) in users" :key="index">
      			<i class="fa fa-user-circle"></i> {{user.first}} 
      		</li>
      	</ul>	
	</div>
	</div>
 </div>
</div>
</template>

<script>
    export default {
	props: ['user'],
	data(){
	     return{
               messages: [],
               newMessage: '',
               users: [],
               activeUser: false,
               typingTimer: false
	     }
	},

	created(){
	this.fetchMessage();

	Echo.join('chat')
      	.here(user => {
      		this.users = user;
      	})
      	.joining(user => {
      		this.users.push(user); 
      	})
      	.leaving(user => {
      		this.users = this.users.filter(u => u.id != user.id);
      	})
      	.listen('MessageSent', (event) => {
      		this.messages.push(event.message);
      	})
      	.listenForWhisper('typing', user => {
      		this.activeUser = user;

      		if(this.typingTimer){
      				 clearTimeout(this.typingTimer);
      		}

      		this.typingTimer = setTimeout(() => {
      			this.activeUser = false;
      		}, 2000);
      	})
	},

	methods:{
		fetchMessage(){
			axios.get('messages').then(response =>{
      				this.messages = response.data;
      		});
		},

		sendMessage(){
		this.messages.push({
			user: this.user,
			message: this.newMessage 
		});

		axios.post('messages', {message: this.newMessage});

		this.newMessage = '';
		},

		sendTypingEvent(){
			Echo.join('chat')
				.whisper('typing', this.user)
		}
	}
    }
</script>
