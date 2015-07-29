<html>
<head>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">

<title>结果</title>
<style>
.button {  
  
    color: #e9e9e9;
	
    border: solid 1px #555;  
    background: gray;  
    background: -webkit-gradient(linear, left top, left bottom, from(#888), to(#575757));  
    background: -moz-linear-gradient(top,  #888,  #575757);  
    filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#888888', endColorstr='#575757');  
}  
</style>
<script>
function goback()
{
	
}
</script>
</head>
<body bgcolor="#D3DCE0">
<br><br><br>     
<center>

<img src="img/sanjiao.jpg" height="150" weight="450">
<br><br><br><br><br>
   
<?php
echo "<strong>"."您选择的排序方式为: "."</strong>"."<u>";
echo "<strong>".@$_POST['choose']."</u>"."。"."</strong>"."</p>";

@$text0=$_POST['text0'];
@$text1=$_POST['text1'];
@$text2=$_POST['text2'];    
@$text3=$_POST['text3'];
@$text4=$_POST['text4'];
@$text5=$_POST['text5'];
@$text6=$_POST['text6'];
@$text7=$_POST['text7'];
@$text8=$_POST['text8'];
echo "<strong>"."您输入的原始数组为: "."<i>";
echo "$text0";
echo " $text1"; 
echo " $text2";
echo " $text3";
echo " $text4";
echo " $text5";
echo " $text6";
echo " $text7";
echo " $text8";
echo "</p>"."</strong>"."</i>";
echo "<strong>"."排序后为  ："."<strong>"."<i>";
@$choose=$_POST['choose'];
if($choose=="直接插入排序")
{
#指定部分数组元素全部向后移动一位
function move(Array $arr, $start = null, $end = null) {
    if(!isset($start) || $start < 0) $start = 0;
    if(!isset($end) || $end >= count($arr)) $end = count($arr) - 2;    #最后只能选到倒数第二个元素
    for($i = $end; $i >= $start; $i--) {
        $arr[$i + 1] = $arr[$i];
    }
    return $arr;
}

#插入排序,使用同一个数组后移方法实现
function insertSort(Array $arr) {
for($i = 1; $i < count($arr); $i++) {    #未排序数组,从第二个元素开始
$insertEle = $arr[$i];    #待插入元素
    for($j = 0; $j < $i; $j++) {    #已排序好数组,从第一个元素开始
    if($arr[$j] > $arr[$i]) {    #按升序排序
        $arr = move($arr, $j, $i - 1);    #先将已排序好数组中大于待插入元素的元素全部后移一位
            $arr[$j] = $insertEle;    #插入待插入元素
            break;
        }
        }
        }
        return $arr;
        }
         
        $arr = array($text0, $text1, $text2,$text3,$text4,$text5,$text6,$text7,$text8);
        $arr = insertSort($arr);
        if($text0==null||$text1==null)
        {
            echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
        }
        else {
        print_r($arr);
        echo "<br><br>"."<a href=' zhijie.html'>"."查看源代码"."</a>";
		echo "</p>"."<table width='650' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：每次从无序列表中取出第一个元素，把它插入到有序表的合适位置，使有序表依然有序。"."</font>"."</table>";
        }
        
       
}
else if($choose=="希尔排序"){
  
    //希尔排序
       function shellSort(Array $arr) {
           $k = initStep(count($arr));
           $step = pow(2, $k) - 1;
       #根据步长进行多次插入排序,依次减少步长,
        for(;$step >= 1; $step = pow(2, --$k) - 1) {
              $arr = insertSort($arr, $step);
        }
            return $arr;
       }

       #求希尔排序初始步长,初始步长公式为2^k<len,len为数组长度,k取最大值
       function initStep($len) {
          $k = 0;
          while(pow(2, $k) < $len) {
                $k++;
           }
            return $k - 1;
        }
  
        #指定部分数组元素按步长向后移动
      function move(Array $arr, $step, $start = null, $end = null) {
            if(!isset($start) || $start < 0) $start = 0;
           if(!isset($end) || $end >= count($arr)) $end = count($arr) - $step - 1;    #最后只能选到倒数第step+1个元素
    
             for($i = $end; $i >= $start; $i -= $step) {
                $arr[$i + $step] = $arr[$i];
            }
            return $arr;
      }
  
         #根据步长进行插入排序
         function insertSort(Array $arr, $step) {
             #进行step次插入排序
               for($i = 0; $i < $step; $i++) {
                     #计算本组需要排到的最后一个元素
                    $lastInx = $i;
                   while($lastInx + $step < count($arr)) $lastInx += $step;
        
                    #进行第i组排序
                    for($j = $i + $step; $j <= $lastInx; $j += $step){#待排序元素从该组第二个元素开始
                          $insertEle = $arr[$j];
                    for($k = $i; $k < $j; $k += $step) {
                                 if($arr[$k] > $arr[$j]) {
                                        $arr = move($arr, $step, $k, $j - $step);
                                           $arr[$k] = $insertEle;
                  
                                            break;
                                      }
                                   }
                               }
                        }
                           return $arr;
                        }
                  
                        $arr = array($text0, $text1, $text2,$text3,$text4,$text5,$text6,$text7,$text8);
                         $arr = shellSort($arr);
                         if($text0==null||$text1==null)
                         {
                             echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
                         }
                         else {
                       print_r($arr);
					   echo "</p>"."<table width='650' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：把记录按下标的一定增量分组，对每组使用直接插入排序算法排序，当增量减至1时，整个文件恰被分为一组。"."</font>"."</table>"; 
                         }
    
}
else if($choose=="冒泡排序")
{
    function bubbleSort($numbers){
        $cnt=count($numbers);
        for($i=0;$i<$cnt-1;$i++){//循环比较
            for($j=$i+1;$j<$cnt;$j++){
                if($numbers[$j]<$numbers[$i]){//执行交换
                    $temp=$numbers[$i];
                    $numbers[$i]=$numbers[$j];
                    $numbers[$j]=$temp;
                }
            }
        }
        return $numbers;
    }
    
    $num=array($text0, $text1, $text2,$text3,$text4,$text5,$text6,$text7,$text8);
    
   
    if($text0==null||$text1==null)
    {
        echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
         
    }
    else {
        var_dump(bubbleSort($num));
        echo "<br><br>"."<a href=' maopao.html'>"."查看源代码"."</a>";
		echo "</p>"."<table width='650' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：比较相邻的两个数，如果第一个比第二个大，就交换他们两个。最后的元素将是最大的一个数。"."</th	>"."</font>"."</table>"; 
    }
}
else if($choose=="快速排序")
{
   
    function quicksort($str){
        if(count($str)<=1) return $str;//如果个数不大于一，直接返回
        $key=$str[0];//取一个值，稍后用来比较；
        $left_arr=array();
        $right_arr=array();
        for($i=1;$i<count($str);$i++){//比$key大的放在右边，小的放在左边；
            if($str[$i]<=$key)
                $left_arr[]=$str[$i];
            else
                $right_arr[]=$str[$i];
        }
        $left_arr=quicksort($left_arr);//进行递归；
        $right_arr=quicksort($right_arr);
        return array_merge($left_arr,array($key),$right_arr);//将左中右的值合并成一个数组；
    }//以下是测试
    $str=array($text0, $text1, $text2,$text3,$text4, $text5,$text6,$text7,$text8);
    
    if($text0==null||$text1==null)
    {
        echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
       
    }
    else
    {
        print_r(quicksort($str));
        echo "<br><br>"."<a href=' kuaisu.html'>"."查看源代码"."</a>";
		echo "</p>"."<table width='750' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：通过一趟排序将要排序的数据分割成独立的两部分，其中一部分的所有数据都比另一部分小，然后再按此方法对这两部"."分数据分别快速排序，以递归进行，一次达到整个数据有序排列。"."</font>"."</table>";
    }
}
else if($choose=="简单选择排序")
{
    
    //选择排序(Selection sort)是一种简单直观的排序算法。它的工作原理如下。首先在未排序序列中找到最小（大）元素，存放到排序序列的起始位置，然后，再从剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾。以此类推，直到所有元素均排序完毕。
    
    function selectSort(&$arr){
        //定义进行交换的变量
        $temp=0;
        for($i=0;$i<count($arr)-1;$i++){
            //假设$i就是最小值
            $valmin=$arr[$i];
            //记录最小值的下标
            $minkey=$i;
            for($j=$i+1;$j<count($arr);$j++){
                //最小值大于后面的数就进行交换
                if($valmin>$arr[$j]){
                    $valmin=$arr[$j];
                    $minkey=$j;
                }
            }
            //进行交换
            $temp=$arr[$i];
            $arr[$i]=$arr[$minkey];
            $arr[$minkey]=$temp;
        }
    }
    
    $arr=array($text0, $text1, $text2,$text3,$text4, $text5,$text6,$text7,$text8);
    selectSort($arr);

    if($text0==null||$text1==null)
    {
        echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
       
    }
    else
    {
        print_r($arr);
        echo "<br><br>"."<a href=' jiandan.html'>"."查看源代码"."</a>";
		echo "</p>"."<table width='650' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：每次从左至右扫描序列，记下最小值的位置。"."</font>"."</table>";
    }
    
}
else if ($choose=="堆排序")
{
    
    #堆排序
    function heapSort(&$arr) {
        #初始化大顶堆
        initHeap($arr, 0, count($arr) - 1);
    
        #开始交换首尾节点,并每次减少一个末尾节点再调整堆,直到剩下一个元素
        for($end = count($arr) - 1; $end > 0; $end--) {
        $temp = $arr[0];
            $arr[0] = $arr[$end];
            $arr[$end] = $temp;
            ajustNodes($arr, 0, $end - 1);
        }
        }
    
        #初始化最大堆,从最后一个非叶子节点开始,最后一个非叶子节点编号为 数组长度/2 向下取整
        function initHeap(&$arr) {
        $len = count($arr);
        for($start = floor($len / 2) - 1; $start >= 0; $start--) {
        ajustNodes($arr, $start, $len - 1);
        }
        }
    
            #调整节点
            #@param $arr    待调整数组
            #@param $start    调整的父节点坐标
            #@param $end    待调整数组结束节点坐标
            function ajustNodes(&$arr, $start, $end) {
            $maxInx = $start;
            $len = $end + 1;    #待调整部分长度
            $leftChildInx = ($start + 1) * 2 - 1;    #左孩子坐标
            $rightChildInx = ($start + 1) * 2;    #右孩子坐标
    
            #如果待调整部分有左孩子
            if($leftChildInx + 1 <= $len) {
            #获取最小节点坐标
            if($arr[$maxInx] < $arr[$leftChildInx]) {
                $maxInx = $leftChildInx;
            }
    
            #如果待调整部分有右子节点
                if($rightChildInx + 1 <= $len) {
                if($arr[$maxInx] < $arr[$rightChildInx]) {
                $maxInx = $rightChildInx;
                }
                }
                }
    
                #交换父节点和最大节点
                if($start != $maxInx) {
                $temp = $arr[$start];
                $arr[$start] = $arr[$maxInx];
                $arr[$maxInx] = $temp;
    
                #如果交换后的子节点还有子节点,继续调整
                if(($maxInx + 1) * 2 <= $len) {
                ajustNodes($arr, $maxInx, $end);
                }
                }
                }
    
                $arr = array($text0, $text1, $text2,$text3,$text4, $text5,$text6,$text7,$text8);
                heapSort($arr);
                
                if($text0==null||$text1==null)
                {
                    echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
                }  
                else
                {
                    print_r($arr);
					echo "</p>"."<table width='650' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：利用堆积树排序算法，利用数组的特点快速定位指定索引的元素，分大根堆和小根堆，最大值一定在堆顶。"."</font>"."</table>";
                }   
}
else if($choose=="二路归并")
{
    //merge函数将指定的两个有序数组(arr1arr2,)合并并且排序
    //我们可以找到第三个数组,然后依次从两个数组的开始取数据哪个数据小就先取哪个的,然后删除掉刚刚取过///的数据
    function al_merge($arrA,$arrB)
    {
        $arrC=array();
        while(count($arrA)&&count($arrB)){
            //这里不断的判断哪个值小,就将小的值给到arrC,但是到最后肯定要剩下几个值,
            //不是剩下arrA里面的就是剩下arrB里面的而且这几个有序的值,肯定比arrC里面所有的值都大所以使用
            $arrC[]=$arrA['0']<$arrB['0']?array_shift($arrA):array_shift($arrB);
        }
        return array_merge($arrC,$arrA,$arrB);
    }
    
    //归并排序主程序
    function al_merge_sort($arr){
        $len=count($arr);
        if($len<=1)
            return$arr;//递归结束条件,到达这步的时候,数组就只剩下一个元素了,也就是分离了数组
        $mid=intval($len/2);//取数组中间
        $left_arr=array_slice($arr,0,$mid);//拆分数组0-mid这部分给左边left_arr
        $right_arr=array_slice($arr,$mid);//拆分数组mid-末尾这部分给右边right_arr
        $left_arr=al_merge_sort($left_arr);//左边拆分完后开始递归合并往上走
        $right_arr=al_merge_sort($right_arr);//右边拆分完毕开始递归往上走
        $arr=al_merge($left_arr,$right_arr);//合并两个数组,继续递归
        return$arr;
    }
    
    $arr=array($text0, $text1, $text2,$text3,$text4, $text5,$text6,$text7,$text8);
 
    if($text0==null||$text1==null)
    {
        echo "<script>"."alert('你没有提交数据，请确定输入数据后再提交')"."</script>";
      
    }
    else
    {
        print_r(al_merge_sort($arr));
        echo "<br><br>"."<a href=' erlu.html'>"."查看源代码"."</a>";
		echo "</p>"."<table width='650' border='1' bgcolor='#FFFFFF' cellspacing='0'>"."<font size='2'>"."<th>"."原理：将已有序的子序列合并，得到完全有序的序列。先使每个子序列有序，再使子序列段间有序。"."将两个有序表合并成一个有序表，称为二路归并。"."</font>"."</table>";
    }
}
else
{
    echo "请选择排序类型！"."</i>";
}
?>  
<div>
<br><br><br><br>
<a href="index.php"><input type="button" value="返回" class="button" style="width: 60px; height: 28px;"></a>
</div>
</center>


</body>
</html>