<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Everything</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">


  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="col-md-6">
              {{Form::open(array('url'=>'brand/create', 'files'=>true))}}
                <div class="form-group">
                    <label for="">Brand</label>
                    <input type="text" class="form-control input-sm" name="brand">

                </div>

                <!-- categories -->
                <div class="form-group">
                    <label for="">Category</label>
                    <select class="input-sm" name="categories[]">
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    <a href="#" class="btn btn-danger btn-xs btn-remove-cat">Remove</a>

                </div>

                <a href="#" class="btn btn-sm btn-info btn-add-cat">Add more Categoy</a>
                <button class="btn btn-sm btn-primary">Save</button>

              {{Form::close()}}
          </div>

          <div class="clearfix">

          </div>

          <div class="col-sm-5">

              <ul>
                  @foreach ($brands as $brand)
                    <li><a href="/brand/edit/{{$brand->id}}">{{$brand->id .'-'. $brand->name}}</a></li>
                  @endforeach
              </ul>

          </div>


        </div>

    </div>


    <script type="text/javascript">

      $('.btn-add-cat').on('click', function(e){

          e.preventDefault();

          var template= '<div class="form-group">'+
                        '<label for="">Category</label>' +
                        '<select name="categories[]" class="input-sm">'+
                        '@foreach($categories as $category)'+
                          '<option value="{{$category->id}}">{{$category->name}}</option>'+
                          '@endforeach'+
                          '</select>'+
                          '<a href="#" class="btn btn-danger btn-xs btn-remove-cat">Remove</a>'+
                          '</div>';
          //apprned before
          $(this).before(template);
              });

            $(document).on('click', '.btn-remove-cat', function(e){
              e.preventDefault();
              $(this).parent('.form-group').remove();


            });



    </script>


  </body>
</html>
