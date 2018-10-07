@extends('Layouts.background')

@section('contents')

    @include('Repeat.header')

    <div id="main_right" class="col-md-12" style="margin-top: 55px;">
        <div class="container">

            <div class="row" style="padding-top: 20px;">
                <div class="col-md-4">
                    <a href="{{ url('greenpetnotifisingle') }}" class="btn btn-warning">返回</a>
                </div>
                <div class="col-md-4" style="text-align: center;">
                    <p style="font-size: 30px;">綠寵物-(單/修改)訊息推送</p>
                </div>
            </div>

            {!! Form::open([ 'id' => 'editnotifisinglefrom', 'method' => 'PUT', 'action' => ['GreenPetNotifiSingleController@update', $TmpViewarray['id']] ]) !!}
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>標題</label>
                        <input value="{{ $TmpViewarray['title'] }}" id="title" name="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>網址</label>
                        <input value="{{ ($TmpViewarray['link'] == "null")?"":$TmpViewarray['link'] }}"  id="link" name="link" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>照片</label>
                        <input id="titlepicload" type="file" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <img id="imagesrc" src="{{ $TmpViewarray['src'] }}" alt="" style="width: 100%;height: 210px;margin-bottom: 1px;">
                        <input id="imagesrcupload" name="imagesrcupload" type="hidden" value="{{ $TmpViewarray['src'] }}">
                        <input id="imagesrcuploadFe" name="imagesrcuploadFe" type="hidden" value="{{ $TmpViewarray['fe'] }}">
                    </div>
                </div>

                {{-- 綠寵物種類 --}}
                    <div class="col-md-12">
                    <div class="form-group">
                        <p>綠寵物種類</p>
                        <div style="border:1px solid #dddddd;height: 120px;overflow-y: scroll;">
                            @foreach($petbigitems as $result)
                                <div class="col-md-3" style="margin: 15px 0px 10px 0px;text-align: center;">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <input {{ ( ($TmpViewarray['four']['type'].'_'.$TmpViewarray['four']['id']) == 'pettype_'.$result->_id ) ? "checked" : "" }} type="radio" name="radiosingle" value="{{ 'pettype_'.$result->_id }}">
                                        </div>
                                        <input value="{{ '( '.$result->pethub.' )'}}" style="text-align: center;" type="text" class="form-control" disabled="true">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- 綠寵物名稱 --}}
                    <div class="col-md-12">
                    <div class="form-group">
                        <p>綠寵物名稱</p>
                        <div style="border:1px solid #dddddd;height: 250px;overflow-y: scroll;">
                            @foreach($petsmallitems as $result)
                                <div class="col-md-4" style="margin: 15px 0px 10px 0px;text-align: center;">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <input {{ ( ($TmpViewarray['four']['type'].'_'.$TmpViewarray['four']['id']) == 'petname_'.$result->_id ) ? "checked" : "" }} type="radio" name="radiosingle" value="{{ 'petname_'.$result->_id }}">
                                        </div>
                                        <input value="{{ '( '.$result->petname.' )'}}" style="text-align: center;" type="text" class="form-control" disabled="true">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- 性別 --}}
                    <div class="col-md-12">
                    <div class="form-group">
                        <p>性別</p>
                        <div style="border:1px solid #dddddd;height: 80px;overflow-y: scroll;">
                            <div class="col-md-3" style="margin: 15px 0px 10px 0px;text-align: center;">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <input {{ ( ($TmpViewarray['four']['type'].'_'.$TmpViewarray['four']['id']) == "gender_0" ) ? "checked" : "" }} type="radio" name="radiosingle" value="gender_0">
                                    </div>
                                    <input id="gender1" value="女性" style="text-align: center;" type="text" class="form-control" disabled="true">
                                </div>
                            </div>
                            <div class="col-md-3" style="margin: 15px 0px 10px 0px;text-align: center;">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <input {{ ( ($TmpViewarray['four']['type'].'_'.$TmpViewarray['four']['id']) == "gender_1" ) ? "checked" : "" }} type="radio" name="radiosingle" value="gender_1">
                                    </div>
                                    <input id="gender1" value="男性" style="text-align: center;" type="text" class="form-control" disabled="true">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--手機(用戶名) --}}
                    <div class="col-md-12">
                    <div class="form-group">
                        <p>手機(用戶名)</p>
                        <div style="border:1px solid #dddddd;height: 250px;overflow-y: scroll;">
                            @foreach($appwebusers as $appwebuserslist)
                                <div class="col-md-3" style="margin: 15px 0px 10px 0px;text-align: center;">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <input {{ (($TmpViewarray['four']['type'].'_'.$TmpViewarray['four']['id'])==('phone_'.$appwebuserslist->phone))?"checked":"" }} type="radio" name="radiosingle" value="{{ 'phone_'.$appwebuserslist->phone }}">
                                        </div>
                                        <input value="{{ '( '.$appwebuserslist->info['name'].' )-'.$appwebuserslist->phone }}" style="text-align: center;" type="text" class="form-control" disabled="true">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">內容(不能超過90字)</label>
                        <textarea id="contents" name="contents" rows="10" style="width:100%;resize:none;border-color: #dddddd;">{{$TmpViewarray['contents']}}</textarea>
                    </div>
                </div>

            </div>

            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12" style="text-align: right;">
                    <button onclick="btnToStore()" type="button"class="btn btn-primary">送出</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        var radiosinglecount = 0;

        function readURL(input){
            if(input.files && input.files[0]){
                let reader = new FileReader();
                reader.onload = function(e){
                    $("#imagesrc").attr('src', e.target.result);
                    document.getElementById("imagesrcupload").value = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            };
        };

        $("#titlepicload").change(function () {
            readURL(this);
            document.getElementById("imagesrcuploadFe").value = $(this).val().split('.').pop();
        });

        function btnToStore() {
            $("input:radio:checked[name='radiosingle']").each(function(index) {
                radiosinglecount++;
            });

            let _title    = $("#title").val();
            let _src      = $("#imagesrc")[0].src;
            let _contents = $("#contents").val();

            if( ( _contents.length > 90) || ( _contents.length <= 0)){
                alert("內容格式錯誤...");
            }else{
                if(_title == ""){
                    alert("標題不得為空");
                }else{
                    if(_src == "http://placehold.it/1170x613"){
                        alert("單項通知封面照尚未上傳");
                    }else{
                        if( (radiosinglecount == 0) ){
                            alert('發送類型尚未選擇');
                        }else{
                            if(confirm("確定修改[單項通知]")){
                                $("#editnotifisinglefrom").submit();
                            };
                        };
                    };
                };
            };

        };

    </script>

    <style type="text/css">

    </style>
@endsection