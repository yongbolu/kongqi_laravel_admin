```
@include('admin.tpl.form.thumbPlace',['data'=>['name'=>'thumb','src'=>'','show'=>0,'title'=>'头像','tips'=>'','rq'=>1,'place'=>1,'obj'=>'thumbUpload']])
      @include('admin.tpl.form.thumbPlace',['data'=>['name'=>'thumb2','src'=>'','show'=>0,'title'=>'头像','tips'=>'','rq'=>1,'place'=>1,'obj'=>'thumbUpload2']])
        @include('admin.tpl.form.text',['data'=>['name'=>'account','title'=>'账号','tips'=>'','rq'=>'rq|ename']])
        @include('admin.tpl.form.text',['data'=>['name'=>'password','title'=>'密码','tips'=>'','rq'=>'rq']])
        @include('admin.tpl.form.checkbox',['data'=>['name'=>'realname','title'=>'角色','tips'=>'','rq'=>'rq',
```