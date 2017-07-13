<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title></title>

    <script src="js/modernizr.min.js"></script>

    <!--[if (gt IE 8) | (IEMobile)]><!-->
    <link rel="stylesheet" href="style/step2.css">
	<link rel="stylesheet" href="style/dashboard.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--<![endif]-->
    <!--[if (lt IE 9) & (!IEMobile)]>
    <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".outerform-inline"); //Fields wrapper
    var add_button      = $(".addnew"); //Add button ID
    
    var x = 1; 
	//initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			var newbook = '<div class="book'+x+'"><div style="margin-bottom:10px;border-bottom:1px solid grey"><p3 style="margin-top:10px;font-weight:bold;font-size:18px;margin-left:5px;">Textbook: '+x+'</p3></div><div class="form-inline">  <div class="book"> <div style="margin-top:10px;margin-bottom:10px;" class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="college">College:</label> <input type="text" class="form-control" placeholder="Eg. Presidency University" id="college"> </div> <div style="margin-bottom:10px;"class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="course">Course:</label> <input type="text" class="form-control" placeholder="Eg. Computer Science" id="course"> </div> </div> <div class="form-inline"> <div style="margin-bottom:10px;" class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="textname">Name:</label> <input type="text" class="form-control" placeholder="Name of the textbook" id="college"> </div> <div style="margin-bottom:10px;" class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="pub">Publication:</label> <input type="text" class="form-control" placeholder="Publication of the textbook" id="course"> </div> </div> <div class="form-inline"> <div style="margin-bottom:10px;"class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="condition">Condition:</label> <select class="form-control" id="condition"> <option>New Book</option> <option>Used Book</option> </select> </div></div> <div class="form-inline"> <div style="margin-bottom:10px;"class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="price">Price:</label> <input type="text" class="form-control" placeholder="Selling Price" id="price"> </div></div> <div class="form-inline"> <div style="margin-bottom:10px;"class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="photo">Upload photo:</label> <input type="file" accept="image/*" capture="camera" class="form-control" id="photo"> </div></div> <div class="form-inline"> <div style="margin-bottom:10px;" class="form-group"> <label style="text-align:left;width:100px;margin-left:5px;" for="desc">Description:</label> <textarea class="form-control" rows="2" id="desc"></textarea> </div></div> </div><input style="margin-top:10px;text-align:center;margin-left:5px;margin-bottom:10px;" type="submit" class="btn btn-danger remove_field" value="Remove Textbook"></div></div>'
            $(wrapper).append(newbook); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $('.book'+x).remove(); x--;
    })
});

</script>
<body style="background-color:rgb(233,235,238);">
<div id="outer-wrap">
<div id="inner-wrap">

    <header id="top" role="banner">
        <div class="block">
            <!--<h1 class="block-title">Book Title</h1>!-->
			
			<logo>myTextbooks</logo>
			
            <a class="nav-btn" id="nav-open-btn" href="#nav"></a>
        </div>
    </header>
    <nav id="nav" role="navigation">
	<a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a><p >Menu</p>
        <div id="menulist" class="block">
            
            <ul class="tabs-menu">
                <li class="current">
                   <i class="material-icons search ">search</i> <a href="#tab-1" id="tab1">Search</a>
                </li><!--
             --><li id="books">
                    <i class="material-icons books" >books</i><a href="#tab-2" id="tab2">Sell your books</a>
                </li><!--
             --><li>
                    <i class="material-icons messages">messages</i><a href="#tab-2" id="tab3">Messages</a>
                </li><!--
             --><li id="favorites">
                    <i class="material-icons favorite">favorite</i><a href="#tab-1" id="tab4">Favourites</a>
                </li><!--
             --><li id="pro">
                    <i class="material-icons profile">account_circle</i><a href="#tab-1" id="tab5">My Profile</a>
                </li>
				<li id="myads">
                    <i class="material-icons myads">receipt</i><a href="#tab-6" id="tab6">My Ads</a>
                </li>
            </ul>
            
        </div>
    </nav>

			
		<br>	

 <div id="tabs-container">
    
    
  <div id="tab-1" class="tab-content">
	<div class="outerform-inline">
        <div class="form-inline">
		  <div style="margin-bottom:10px;border-bottom:1px solid grey">
		  <p3 style="margin-top:10px;font-weight:bold;font-size:18px;margin-left:5px;">Submit a free ad</p3>
		  </div>
		     <div class="book">
				<div style="margin-top:10px;margin-bottom:10px;" class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="college">College:</label>
						<input type="text" class="form-control" placeholder="Eg. Presidency University" id="college">
				</div>
				<div style="margin-bottom:10px;"class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="course">Course:</label>
						<input type="text" class="form-control" placeholder="Eg. Computer Science" id="course">
				</div>
      </div>
           <div class="form-inline">		   
				<div style="margin-bottom:10px;" class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="textname">Name:</label>
						<input type="text" class="form-control" placeholder="Name of the textbook" id="college">
				</div>
				<div style="margin-bottom:10px;" class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="pub">Publication:</label>
						<input type="text" class="form-control" placeholder="Publication of the textbook" id="course">
				</div>
		   </div>
		   <div class="form-inline">
				<div style="margin-bottom:10px;"class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="condition">Condition:</label>
								<select class="form-control" id="condition">
									<option>New Book</option>
									<option>Used Book</option>
									
								</select>
				</div></div>
			<div class="form-inline">
				<div style="margin-bottom:10px;"class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="price">Price:</label>
						<input type="text" class="form-control" placeholder="Selling Price" id="price">
				</div></div>
			<div class="form-inline">	
				<div style="margin-bottom:10px;"class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="photo">Upload photo:</label>
						<input type="file" accept="image/*" capture="camera" class="form-control"  id="photo">
				</div></div>
			<div class="form-inline">	
				<div style="margin-bottom:10px;" class="form-group">
						<label style="text-align:left;width:100px;margin-left:5px;" for="desc">Description:</label>
						<textarea class="form-control" rows="2" id="desc"></textarea>
				</div></div>
			 </div>	
				
			</div>
				<input style="margin-top:10px;text-align:center;margin-left:5px;" type="submit" class="btn btn-success" value="Submit Ad">
				<input style="margin-top:10px;text-align:center;margin-left:5px;" type="submit" class="btn btn-primary addnew" value="Add Another Textbook">
		
		</div>
		</div>
			
			
			
			
			
			
			
			
			
			
        <div id="tab-2" class="tab-content">
            Donec semper dictum sem, quis pretium sem malesuada non. Proin venenatis orci vel nisl porta sollicitudin. Pellentesque sit amet massa et orci malesuada facilisis vel vel lectus. Etiam tristique volutpat auctor. Morbi nec massa eget sem ultricies fermentum id ut ligula. Praesent aliquet adipiscing dictum. Suspendisse dignissim dui tortor. Integer faucibus interdum justo, mattis commodo elit tempor id. Quisque ut orci orci, sit amet mattis nulla. Suspendisse quam diam, feugiat at ullamcorper eget, sagittis sed eros. Proin tortor tellus, pulvinar at imperdiet in, egestas sed nisl. Aenean tempor neque ut felis dignissim ac congue felis viverra. 
        
        </div>
        <div id="tab-3" class="tab-content">
            Duis egestas fermentum ipsum et commodo. Proin bibendum consectetur elit, hendrerit porta mi dictum eu. Vestibulum adipiscing euismod laoreet. Vivamus lobortis tortor a odio consectetur pulvinar. Proin blandit ornare eros dictum fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur laoreet, ante aliquet molestie laoreet, lectus odio fringilla purus, id porttitor erat velit vitae mi. Nullam posuere nunc ut justo sollicitudin interdum. Donec suscipit eros nec leo condimentum fermentum. Nunc quis libero massa. Integer tempus laoreet lectus id interdum. Integer facilisis egestas dui at convallis. Praesent elementum nisl et erat iaculis a blandit ligula mollis. Vestibulum vitae risus dui, nec sagittis arcu. Nullam tortor enim, placerat quis eleifend in, viverra ac lacus. Ut aliquam sapien ut metus hendrerit auctor dapibus justo porta. 
        </div>
        <div id="tab-4" class="tab-content">
            Proin sollicitudin tincidunt quam, in egestas dui tincidunt non. Maecenas tempus condimentum mi, sed convallis tortor iaculis eu. Cras dui dui, tempor quis tempor vitae, ullamcorper in justo. Integer et lorem diam. Quisque consequat lectus eget urna molestie pharetra. Cras risus lectus, lobortis sit amet imperdiet sit amet, eleifend a erat. Suspendisse vel luctus lectus. Sed ac arcu nisi, sit amet ornare tellus. Pellentesque nec augue a nibh pharetra scelerisque quis sit amet felis. Nullam at enim at lacus pretium iaculis sit amet vel nunc. Praesent sapien felis, tincidunt vitae blandit ut, mattis at diam. Suspendisse ac sapien eget eros venenatis tempor quis id odio. Donec lacus leo, tincidunt eget molestie at, pharetra cursus odio. 
        </div>
    
</div>

 
  
			
			
			
			
			
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
<!--/#inner-wrap-->
</div>
<!--/#outer-wrap-->


<script src="js/main.jquery.js"></script>

</body>
</html>
