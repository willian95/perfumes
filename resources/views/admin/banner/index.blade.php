@extends("layouts.admin")

@section("content")
    
    <div id="dev-category">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content" v-cloak>
            <div class="d-flex flex-column-fluid">

                <div class="container">
                
                    <div class="card card-custom gutter-b">
                        <div class="card-header flex-wrap py-3">
                            <div class="card-title">
                                <h3 class="card-label">Banner
                            </div>
                        </div>
                        <div class="card-body">
                            <!--begin: Datatable-->
                            
                            <div class="row">
                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="smallText">Texto pequeño</label>
                                        <textarea v-model="smallText" id="smallText" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bigText">Texto grande</label>
                                        <textarea v-model="bigText" id="bigText" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="image">Imágen o video</label>
                                        <input type="file" class="form-control" ref="file" @change="onImageChange" accept="image/*|video/*">
                                        @if($type == "image")
                                            <img id="blah" src="{{ env('CMS_URL').'/images/banners/'.App\Banner::find(1)->image }}" class="full-image" style="margin-top: 10px; width: 40%">
                                        @else

                                        <video loop style="width: 100%;" autoplay="true" muted="muted">
                                            <source src="{{ env('CMS_URL').'/images/banners/'.App\Banner::find(1)->image }}" type="video/mp4">
                                        </video>

                                        @endif
                                        
                                    </div>
                                </div>


                            </div>
                            

                            <div class="row">
                                <div class="col-12">
                                    <p class="text-center">
                                        <button class="btn btn-success" @click="update()">Actualizar</button>
                                    </p>
                                </div>
                            </div>

                            <!--end: Datatable-->
                        </div>
                    </div>

                </div>

            </div>

        </div>

        


    </div>

@endsection

@push("scripts")

    <script>
        
        const app = new Vue({
            el: '#dev-category',
            data(){
                return{
                    image:"",
                    type:"{{ $type }}",
                    imagePreview:"{{ url('/') }}"+"/images/banners/"+"{{ $image }}",
                    smallText:"{{ $smallText }}",
                    bigText:"{{ $bigText }}"
                }
            },
            methods:{
                
                update(){

                    axios.post("{{ url('/admin/banner/update') }}", {smallText:this.smallText, bigText: this.bigText, image: this.image}).then(res => {

                        if(res.data.success == true){

                            swal({
                                title: "Excelente!",
                                text: res.data.msg,
                                icon: "success"
                            })
                            

                        }else{
                            
                            alert(res.data.msg)
                        }

                        }).catch(err => {
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })                    

                },
                onImageChange(e){
                    this.image = e.target.files[0];

                    this.imagePreview = URL.createObjectURL(this.image);
                    let files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
           
                    this.createImage(files[0]);
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
                


            },
            mounted(){


            }

        })
    
    </script>

@endpush