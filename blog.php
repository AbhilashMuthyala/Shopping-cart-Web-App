<!doctype html>
<html>
<head>

<style>

body
{
background:#808080
}

#blgdesc
{
border:1px solid;
border-radius:5px 5px 5px 5px;
width:500px;
height:auto;
margin-top:8px;
box-shadow:3px 3px 3px 3px;

}
p
{

text-align:center;
}
#maindiv
{
text-align:center;
border:1px dotted;
padding-bottom:20px;
}
</style>

</head>
<body>


<?php
$filename = "blog.txt";
if(file_exists("blog.txt"))
{
$handle = fopen($filename, "rb");
while (!feof($handle)) {
$contents = fread($handle, filesize($filename));
$contentsplit=explode('$',$contents);
$reversed = array_reverse($contentsplit);


for($i=0;$i<(count($contentsplit)-1);$i++)
	
//for($i=(count($contentsplit)-2);$i>=0;$i--)
{
$blogdetailssplit=explode(';',$contentsplit[$i]);
for($j=0;$j<count($blogdetailssplit);$j++)
{
$blognames[$i]=$blogdetailssplit[0];
$blogdetails[$blogdetailssplit[0]][$j]=$blogdetailssplit[$j];
}
}
}
for($k=0;$k<count($blognames);$k++)
{
//for($s=0;$s<count($blogdetails[$blognames[$k]]);$s++)
//{
?>
<div id="maindiv">
<h1><?php echo $blogdetails[$blognames[$k]][1]?></h1>
<h4>by&nbsp;<?php echo $blogdetails[$blognames[$k]][0]?>&nbsp;on&nbsp;<?php echo $blogdetails[$blognames[$k]][3]?></h4>
<img src="images/blog/<?php echo trim($blognames[$k]).'.jpeg'?>"/>
<center>
<div id="blgdesc">
<p><?php echo $blogdetails[$blognames[$k]][2]?></p>

</div>
</center>
</div>


<?php 
//}
}
fclose($handle);
}
else
{
	echo "No blogs exist";
}
?>
</body>
</html>