<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (!isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="review-editor/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <script src="js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="review-editor/bootstrap-wysiwyg.js"></script>
        <script type="text/javascript" src="review-editor/jquery.hotkeys.js"></script>
        <script type="text/javascript" src="review-editor/google-code-prettify/prettify.js"></script>
        <link href="assets/css/review-editor.css" rel="stylesheet">
    </head>
    <body>
      <?php
        if (isset($_SESSION['errormsg'])) {
          echo "<p style='color:red'>".$_SESSION['errormsg']."</p>";
          unset($_SESSION['errormsg']);
        }
        $resID = $_GET['id'];
        $userID = $_SESSION['ID'];
        $revrow = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM review WHERE UserID = ".$userID." AND RestaurantID = ".$resID." LIMIT 1"));
       ?>
      <label for="restaurant"><h2><b>Restaurant</b></h2></label></br>
          <?php
            $restaurants = mysqli_query($con, "SELECT RestaurantID, Name FROM restaurant");
            $options = "";
            $selected = false;
            while ($row = mysqli_fetch_array($restaurants)) {
              if (isset($_GET['id']) && $_GET['id'] == $row['RestaurantID']) {
                $options .= "<option selected ";
                $selected = true;
              }
              else
                $options .= "<option ";
              $options .= "value='".$row['Name']."'>".$row['Name']."</option>";
          	}
            if ($selected && isset($_GET['id']))
              echo "<select disabled ";
            else
              echo "<select ";
            echo "class=\"selectpicker\" id=\"restaurant\"data-live-search=\"true\" title=\"Choose the restaurant...\">";
            echo $options;
            echo "</select>";
          ?>
        <br/>
        <div class="form-group">
          <label for="titleForm"><h3><b>Title</b></h3></label>
          <input class="form-control" id="titleForm" type="text" maxlength="50" placeholder="Review Title"
          <?php if (isset($_SESSION['edit']) && isset($_GET['id'])) { ?>
            value=<?php echo $revrow['Title'] ?>> <?php } else { ?>
            >
          <?php } ?>
        </div>
        <h2><small>
          By
          <?php
            echo $_SESSION['Username'];
          ?>
       </small></h2>
        <hr/>
        <div id="alerts"></div>
        <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
            <div class="btn-group">
                <a class="btn dropdown-toggle" style="padding: 3px 6px;" data-toggle="dropdown" title="Font">
                    <i class="icon-font"></i>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu"></ul>
            </div>
            <div class="btn-group">
                <a class="btn dropdown-toggle" style="padding: 3px 6px;" data-toggle="dropdown" title="Font Size">
                    <i class="icon-text-height"></i>&nbsp;<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a data-edit="fontSize 6">
                            <font size="6">Huge</font>
                        </a>
                    </li>
                    <li>
                        <a data-edit="fontSize 5">
                            <font size="5">Normal</font>
                        </a>
                    </li>
                    <li>
                        <a data-edit="fontSize 3">
                            <font size="3">Small</font>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)">
                    <i class="icon-bold"></i>
                </a>
                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)">
                    <i class="icon-italic"></i>
                </a>
                <a class="btn" data-edit="strikethrough" title="Strikethrough">
                    <i class="icon-strikethrough"></i>
                </a>
                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)">
                    <i class="icon-underline"></i>
                </a>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="insertunorderedlist" title="Bullet list">
                    <i class="icon-list-ul"></i>
                </a>
                <a class="btn" data-edit="insertorderedlist" title="Number list">
                    <i class="icon-list-ol"></i>
                </a>
                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)">
                    <i class="icon-indent-left"></i>
                </a>
                <a class="btn" data-edit="indent" title="Indent (Tab)">
                    <i class="icon-indent-right"></i>
                </a>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)">
                    <i class="icon-align-left"></i>
                </a>
                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)">
                    <i class="icon-align-center"></i>
                </a>
                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)">
                    <i class="icon-align-right"></i>
                </a>
                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)">
                    <i class="icon-align-justify"></i>
                </a>
            </div>
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink">
                    <i class="icon-link"></i>
                </a>
                <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                    <button class="btn" type="button">Add</button>
                </div>
                <a class="btn" data-edit="unlink" title="Remove Hyperlink">
                    <i class="icon-cut"></i>
                </a>

            </div>

            <div class="btn-group">
                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn">
                    <i class="icon-picture"></i>
                </a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage"/>
            </div>
            <div class="btn-group">
                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)">
                    <i class="icon-undo"></i>
                </a>
                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)">
                    <i class="icon-repeat"></i>
                </a>
            </div>
        </div>

        <form action="review-editor/send.php" method="post" enctype="multipart/form-data" id='submitForm'>
          <?php if (isset($_SESSION['edit']) && isset($_GET['id'])) { ?>
          <div id="editor" econtent><?php echo $revrow['Content'] ?>
            <?php } else { ?>
          <div class="placeholder" placeholder="Describe your restaurant here&hellip;" id="editor">
            <?php } ?>
          </div>
          <br/>
					<a class="btn btn-large btn-default jumbo" href="#" onClick= "$('#mySubmission').val($('#editor').cleanHtml(true));
                                                                        $('#titleSubmission').val($('#titleForm').val());
                                                                        $('#restaurantSubmission').val($('#restaurant option:selected').cleanHtml(true));
                                                                        $('#submitForm').submit();">
          <?php if (isset($_SESSION['edit']) && isset($_GET['id'])) { ?>
            Update</a>
          <?php } else { ?>
            Submit</a>
          <?php } ?>
            <input type='hidden' name='title' id='titleSubmission'/>
            <input type='hidden' name='username' id='usernameSubmission' value=<?php echo "'".$_SESSION['Username']."'"?>/>
            <input type='hidden' name='restaurantName' id='restaurantSubmission'/>
				    <input type='hidden' name='formData' id='mySubmission'/>
			  </form>
    </body>
    <script>
        $(function() {
            function initToolbarBootstrapBindings() {
                var fonts = [
                        'Serif',
                        'Sans',
                        'Arial',
                        'Arial Black',
                        'Courier',
                        'Courier New',
                        'Comic Sans MS',
                        'Helvetica',
                        'Impact',
                        'Lucida Grande',
                        'Lucida Sans',
                        'Tahoma',
                        'Times',
                        'Times New Roman',
                        'Verdana'
                    ],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                $.each(fonts, function(idx, fontName) {
                    fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                });
                $('a[title]').tooltip({container: 'body'});
                $('.dropdown-menu input').click(function() {
                    return false;
                }).change(function() {
                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                }).keydown('esc', function() {
                    this.value = '';
                    $(this).change();
                });

                $('[data-role=magic-overlay]').each(function() {
                    var overlay = $(this),
                        target = $(overlay.data('target'));
                    overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                });
            };
            function showErrorAlert(reason, detail) {
                var msg = '';
                if (reason === 'unsupported-file-type') {
                    msg = "Unsupported format " + detail;
                } else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button><strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            };
            initToolbarBootstrapBindings();
            $('#editor').wysiwyg({fileUploadError: showErrorAlert});
            window.prettyPrint && prettyPrint();
        });
    </script>
</html>
