<?
    $style_num = isset($_COOKIE['style']) ? $_COOKIE['style'] : 1;
    
    if(isset($_POST['change_style']))
    {
        if(isset($_POST['style1']))
            $style_num = 1;
        if(isset($_POST['style2']))
            $style_num = 2;
        if(isset($_POST['style3']))
            $style_num = 3;
 
        setcookie('style', $style_num, time()+60*60*24*30, '/');
    }
?>
 
<head>
<link rel="stylesheet" href="style<?=$style_num?>.css">
 
<head>
<body>
    <form method="post">
        <input type="hidden" name="change_style" />
        <button type="submit" name="style1" value="Стиль1">Стиль 1</button>
        <button type="submit" name="style2" value="Стиль2" >стиль 2</button>
        <button type="submit" name="style3" value="Стиль3" >стиль 3</button>
    </form>
</body>