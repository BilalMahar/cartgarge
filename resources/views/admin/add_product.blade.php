    @extends('layouts.app')

    @section('content')
    <form class="form-horizontal" action="{{ route('store.product') }}" id="variant"   method="post"  enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div>

            <!-- Form Name -->
            <legend> Add PRODUCTS</legend>
            <div class="panel panel-primary">
                <div class="panel-heading">Title</div>
                <div class="panel-body">
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="category">Select Category</label>
                        <div class="col-md-4">
                            <select name="category_id" class="form-control">
                                <option value=""> -- Select One --</option>
                                @foreach($products as $product)
                                    <option value="{{$product->id}}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">Product Title</label>
                        <div class="col-md-4">
                            <input id="available_quantity" name="title"  class="form-control input-md"  type="text">
                        </div>
                    </div>
                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_description">PRODUCT DESCRIPTION</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="product_description" name="description"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Image</div>
                <div class="panel-body">
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton">auxiliary_image</label>
                        <div class="col-md-4">
                            <input name="image" class="input-file" type="file">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

            <div class="panel panel-primary">
                <div class="panel-heading">Pricing</div>
                <div class="panel-body">
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton">SKU</label>
                        <div class="col-md-4">
                            <input id="available_quantity" name="sku" class="form-control input-md"  type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton">price</label>
                        <div class="col-md-4">
                            <input id="available_quantity" name="price"  class="form-control input-md" type="text">
                        </div>
                    </div>
                        <!-- Text input-->
                    <div class="form-group">
                            <label class="col-md-4 control-label" for="available_quantity">AVAILABLE QUANTITY</label>
                            <div class="col-md-4">
                                <input id="available_quantity" name="quantity" placeholder="AVAILABLE QUANTITY" class="form-control input-md"  type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <div class="panel panel-primary">
        <div class="panel-heading"> Luxary-Image</div>
        <div class="panel-body">
            <!-- File Button -->
            <div class="form-group">
                <form  action="{{route('store.image')}}"

                       class="dropzone"
                       id="my-awesome-dropzone" method="post">
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
    <form class="form-horizontal" action="{{ route('store.variant') }}" id="variant1"   method="post">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>


        <div class="panel panel-primary">
                <div class="panel-heading">variants</div>
                <div class="panel-body">
                    <p>Add variants if this product comes in multiple versions, like different sizes or colors.</p>
                    <!-- File Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="filebutton">Options name</label>
                        <label class="col-md-6 control-label" for="filebutton">Options values</label>
                            <div class="col-md-6">

                            <div class="key">
                                <div class="form-group">
                                    <select name="varient[0][key]" class="form-control col-md-11">
                                        <option value=""> -- Select varient --</option>
                                        @foreach($keys as $key)
                                            <option value="{{$key->id}}">{{ $key->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <button type="button" class="add_field_button">Add Field</button>
                    </div>
                        <div class="col-md-6">

                            <div class="value">
                                <div class="form-group">
                                    <input  class="form-control col-md-11 blur" name="varient[0][value]"multiple="multiple"/></div>
                            </div>


                        </div>
                </div>

                    <div class="container">
                        <table class="table table-striped ">
                            <thead>
                            <tr style="background-color: #e3e3e3" >
                                <th>Variants</th>
                                <th>Price</th>
                                <th>Sku</th>
                            </tr>
                            </thead>
                            <tbody id="result">
                            @include('admin.partials.variants')
                            </tbody>
                        </table>

                    </div>
            </div>
            </div>
    </form>

        <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button  type="submit" form="variant" class="btn btn-primary">Save</button>
                        </div>
                    </div><!-- Button -->

                        <div class="col-md-4">
                            <button  type="submit" form="variant1" class="btn btn-primary">Savevariant</button>
                        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

        $(document).ready(function() {
            var wrapper = $(".key"); //Fields wrapper
            var wrapper1 = $(".value");
            var max_fields = 20;
            var counter = 0;
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    counter++;
                    x++; //text box increment
                    $ContentToAppend = $('<div class="form-group">\n' +
                        '                                    <select "name="varient[\'+counter+\'][key]" class="form-control col-md-11">\n' +
                        '                                        <option value=""> -- Select varient --</option>\n' +
                        '                                        @foreach($keys as $key)\n' +
                        '                                            <option value="{{$key->id}}">{{ $key->name }}</option>\n' +
                        '                                        @endforeach\n' +
                        '                                    </select>\n' +
                        '\n' +
                        ' </div>');
                    $(wrapper).append($ContentToAppend);


                    $moreContentToAppend =  $('<div class="form-group">\n'+'<input class="form-control col-md-11 giveClass" name="varient['+counter+'][value]"multiple="multiple"/></div>\n' +
                        '\n' + '</div>');
                    /*
                    * append class to element
                    * */
                    $(wrapper1).append($moreContentToAppend);
                    $('.giveClass').addClass("blur");
                    /*
                    blur function
                    */

                    $(document).ready(function(){
                        $(".blur").blur(function(){
                            alert("This input field has lost its focus.");
                        });
                    });
                }
            });

        /*
        * mutipal images
        * */
        var myDropzone = new Dropzone("div#myId", { url: "store.image"});
        /*
        * on blur function*/

        });

    </script>
    <script>
        $(document).ready(function(){
            $(".blur").blur(function(){
                alert("This input field has lost its focus.");
            });
        });
    </script>
    @endsection()