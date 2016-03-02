<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
          <div class="col-sm-6">
              @if($errors->has())
                <div class="alert alert-success">{{$errors->first('success')}}</div>
              @endif

            <!-- edit form
-->

      {{Form::open(array('url'=>'brand/update', 'files'=>true))}}
      <input type="hidden" name="brand_id" value="{{$brand->id}}">

      <div class="form-group">
          <label for="">Brand</label>
          <input type="text" class="form-control input-sm" name="brand" value="{{$brand->name}}">
      </div>

      @foreach($brand_categories as $brand_category)
        <div class="form-group">
            <label for="">Category</label>
            <!--- selected value in collection with brand categories pivot value from db -->
            <!-- matches and applies selected attribute to the option tag -->
              {{Form::select('categories[]', $brand_categories_colxn, $brand_category->id, ['class'=>'input-sm'])}}
              <a href="#" class="btn btn-danger btn-xs btn-remove-cat">Remove</a>
        </div>
        @endforeach

          <a href="#" class="btn btn-sm btn-info btn-add-cat">Add more Category</a>



          </div>



      </div>


    </div>

    <script type="text/javascript">

      $('.btn-add-cat').on('click', function(e){
          e.preventDefault();

          var template= '<div class="form-group">'+
                        '<label for="">Category</label>' +
                        '<select name="categories[]" class="input-sm">'+
                        '@foreach($brand_categories_colxn as $category)'+
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
