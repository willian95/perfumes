@extends("layouts.user")

@section("content")

    <div class="container" id="dev-login">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" v-model="password">
                            </div>
                            <button type="button" class="btn btn-primary" @click="login()">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push("scripts")

<script type="text/javascript">
        
        const app = new Vue({
            el: '#dev-login',
            data(){
               return{
                   email:"",
                   password:""
               }
            },
            methods:{
                
                login(){

                    axios.post("{{ url('/login') }}",{email: this.email, password: this.password})
                    .then(res => {

                        if(res.data.success == true){
                            
                            alert(res.data.msg)
                            this.email = ""
                            this.password = ""

                            if(res.data.role_id == 2)
                            {
                               
                                window.location.href = "{{ url('/') }}"
                                
                                
                            }

                            else if(res.data.role_id == 1)
                                window.location.href = "{{ url('/admin/dashboard') }}"

                        }else{
                            alert(res.data.msg)
                        }

                    })
                    .catch(err => {

                        $.each(err.response.data.errors, function(key, value) {
                            alert(value)
                        })

                    })

                }

            },
            created(){
                

            }
        }); 


    </script>

@endpush