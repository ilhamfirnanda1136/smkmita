<!DOCTYPE html>
<html>
<head>
	<title>Smkmita</title>
</head>
<link rel="icon" href="https://smkmita.sch.id/wp-content/uploads/2017/10/favicon.png" sizes="32x32" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<style type="text/css">

p{
  font-size:10em;
  font-weight:bold;
 text-align: center;
 margin-bottom: 50px;
 margin-top: 69px;
  background:#333 -webkit-radial-gradient(circle,rgba(255,255,255,1),rgba(255,255,255,0),rgba(255,255,255,0)) no-repeat -280px -94px;
  -webkit-background-clip:text;
  -webkit-background-size:388px;
  color:rgba(255,255,255,0.1);
  -webkit-animation:ani 5s linear infinite;
}

@keyframes ani{
  from{
    background-position:-280px -100px;
    }
  to{
    background-position:790px -100px;
    }
}
	html, body
{
    height: 100%;
}

body
{
    font-family:arial;background-color:black;
    margin: 0;
    background-color: #000000;
}

#app_cover
{
    position: absolute;
    top: 50px;
    right: 0;
    left: 0;
    width: 460px;
    margin: 0 auto;
}


.block
{
    float: left;
    width: 120px;
    display: block;
    position: relative;
    text-decoration: none;
}

.block:nth-child(2)
{
    margin: 0 50px;
}

.card
{
    width: 120px;
    margin-top: 200px;
    padding-bottom: 30px;
    background-size: cover;
    box-shadow: 0 10px 20px -5px #b6b6b6;
}

.c_c_card
{
    position: absolute;
    top: 0;
    width: 0;
    overflow: hidden;
    transition: 0.4s ease-in-out width;

}

.block:hover .c_c_card
{
    width: 100%;
}

#c_fb
{
    background-color: #4267b2;
}


.cc_card
{
    background-color: #fff;
}

#c_tw
{
    background-color: #1da1f2;
}


#c_gl
{
    background-color: #d93025;
}


.c_brand_logo
{
    color: #fff;
    font-size: 34px;
    padding: 30px 30px 0 30px;
}

#c_o_fb .c_brand_logo
{
    color: #4267b2;
}

#c_o_tw .c_brand_logo
{
    color: #1da1f2;
}

#c_o_gl .c_brand_logo
{
    color: #d93025;
}

.c_brand_logo i
{
    width: 34px;
    height: 34px;
    display: block;
    text-align: center;
    padding: 13px;
    margin: 0 auto;
    border-radius: 50%;
}

#c_fb .c_brand_logo i
{
    background-color: rgba(66, 103, 178, 0.79);
}

#c_tw .c_brand_logo i
{
    background-color: rgba(29, 161, 242, 0.79);
}

#c_gl .c_brand_logo i
{
    background-color: rgba(217, 48, 37, 0.79);
}

.cc_card .c_brand_logo i
{
    background-color: rgba(255, 255, 255, 0.79);
}
 

.c_share_link
{
    color: #000;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    text-align: center;
    font-weight: bold;
    max-width: 60px;
    font-size: 14px;
    margin: 0 auto;
    text-transform: uppercase;
    padding: 6px;
    background-color: rgba(255, 255, 255, 0.79);
    border-radius: 3px;
}

#c_o_fb .c_share_link
{
    color: #4267b2;
    border-bottom-color: #4267b2;
}

#c_o_tw .c_share_link
{
    color: #1da1f2;
    border-bottom-color: #1da1f2;
}

#c_o_gl .c_share_link
{
    color: #d93025;
    border-bottom-color: #d93025;
}

#ytd_link
{
    position: relative;
    top: 50px;
    display: block;
    width: 166px;
    clear: both;
    color: #d93025;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
    text-decoration: none;
    text-align: center;
    padding: 6px 14px 10px 14px;
    margin: 0 auto;
    margin-bottom:50px;
    background-color: #f8f8f8;
    border: 1px solid #d93025;
    border-radius: 2px;
}

#ytd_link i
{
    display: inline-block;
    width: 18px;
    margin-right: 6px;
    vertical-align: middle;
}
</style>
<body>
    <p>SMKMITA</p>
	<div id="app_cover">
        <a href="admin/auth/login.php" target="_blank" class="block" onclick="main()">
            <div class="card" id="c_fb">
                <div class="c_brand_logo"><i class="fas fa-users-cog"></i></div>
                <div class="c_share_link">Admin</div>
            </div>
            <div class="c_c_card">
                <div class="card cc_card" id="c_o_fb">
                    <div class="c_brand_logo"><i class="fas fa-users-cog"></i></div>
                    <div class="c_share_link">Admin</div>
                </div>
            </div>
        </a>
        <a href="guru/auth/login.php" target="_blank" class="block" onclick="main()">
            <div class="card" id="c_gl">
                <div class="c_brand_logo"><i class="fas fa-users"></i></div>
  
                <div class="c_share_link">Guru</div>
            </div>
            <div class="c_c_card">
                <div class="card cc_card" id="c_o_gl">
                    <div class="c_brand_logo"><i class="fas fa-users"></i></div>
                
                    <div class="c_share_link">Guru</div>
                </div>
            </div>
        </a>
        <a href="siswa/auth/login.php" target="_blank" class="block" onclick="main()">
            <div class="card" id="c_tw">
                <div class="c_brand_logo"><i class="fas fa-user-graduate"></i></div>
             
                <div class="c_share_link">Siswa</div>
            </div>
            <div class="c_c_card">
                <div class="card cc_card" id="c_o_tw">
                    <div class="c_brand_logo"><i class="fas fa-user-graduate"></i></div>
                 
                    <div class="c_share_link">Siswa</div>
                </div>
            </div>
        </a>
    </div>
    <script type="text/javascript">
      
    </script>
</body>
</html>