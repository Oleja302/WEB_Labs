

<?php   
    
// **********************Task 1
print("**********************Task1**********************");
echo "<br/>";
function power($val, $pow)
{
  if ($pow !== 1) {
    return $val * power($val, $pow - 1);
  } else {
    return $val;
  }
}

echo power(5, 2);
echo "<br/>";
echo "<br/>";
print("**********************Task2**********************");
echo "<br/>";

//**********************Task 2

date_default_timezone_set('Europe/Moscow');
$time = time();
$hour = date('G', $time);
$min = date('i', $time);

$hourArr = [
    'час', 'часа', 'часов'
];
$minArr = [
    'минута', 'минуты', 'минут'
];

function comparisonText($value, $arr)
{
    if (!is_numeric($value) || !is_array($arr) || $value < 0) {
        return 'incorrect data!';
    }

    if (preg_match('/[1][1-9]/', substr($value, -2))) {
        $teen = true;
    }

    $lastNumber = $value % 10;

    if ($lastNumber == 1 && !$teen) {
        $requiredText = $arr[0];
    } elseif (preg_match('/[2-4]/', $lastNumber) && !$teen) {
        $requiredText = $arr[1];
    } else {
        $requiredText = $arr[2];
    }

    return $value . ' ' . $requiredText;
}

echo comparisonText($hour, $hourArr) . ' ' . comparisonText($min, $minArr);


//**********************Task 3
echo "<br/>";
echo "<br/>";
print("**********************Task3**********************");
echo "<br/>";

function loop()
{
    $a=0;
    while($a++ < 100) if($a%3==0) echo $a.' ';
}

echo loop();
echo "<br/>";
echo "<br/>";
print("**********************Task4**********************");
echo "<br/>";
//**********************Task 4

function doWhile(){             
    $i = 0;                              
    do{                                    
        if($i == 0){                        
            echo "$i - Это ноль <br>";      
        }elseif($i % 2 == 0){
            echo "$i - четное  <br>";
        }else{
            echo "$i - нечетное  <br>";
        }
        $i++;   
    }while($i <= 10);
}
doWhile();
echo "<br/>";
echo "<br/>";
print("**********************Task5**********************");
echo "<br/>";
//tsk 5
for($i = 0; print $i, $i++ < 9;)

echo "<br/>";
echo "<br/>";
echo "<br/>";
print("**********************Task6**********************");

//**********************Task 6
function towns()
{
    $arrayObl = [                   
        'Московская' => [         
            'Москва',                 
            'Зеленоград',         
            'Клин'                 
        ],
        'Ленинградская' => [      
            'Санкт-Питербург',
            'Всеволожск',
            'Павловск'
        ],
    ];

    

    echo "<br>";

    foreach ($arrayObl as $obl => $city) {      
        echo $obl . ": <br>";                   
        foreach ($city as $cityName) {         
            echo  "____" .  $cityName . "<br>"; 
        
}
    }
}
echo towns();
echo "<br/>";
echo "<br/>";
print("**********************Task7**********************");
echo "<br/>";
//**********************Task 7
function townsK()
{
    $arrayObl = [                   
        'Московская' => [         
            'Москва',                 
            'Зеленоград',         
            'Клин'                 
        ],
        'Ленинградская' => [      
            'Санкт-Питербург',
            'Всеволожск',
            'Павловск'
        ],
    ];    

    echo "<br>";

    foreach ($arrayObl as $obl => $city) {      
        echo $obl . ": <br>";                   
        foreach ($city as $cityName) {   
             if (preg_match('/^(К.*)$/', $cityName, $mathes))
             {
                echo  "____" .$cityName . "<br>"; 
             }
        
        }
    }
}

echo townsK();

//**********************Task 8
echo "<br/>";
echo "<br/>";
print("**********************Task8**********************");
echo "<br/>";

function translit()
{
    $string = "Строка";
 
$translit = array("а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "zh",  "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "kh", "ц" => "c", "ч" => "ch",  "ш" => "sh",  "щ" => "sch", "ь" => "",  "ы" => "y", "ъ" => "", "э" => "e", "ю" => "yu", "я" => "ya", "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "E", "Ж" => "Zh",  "З" => "Z", "И" => "I", "Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F", "Х" => "KH", "Ц" => "C", "Ч" => "Ch",  "Ш" => "Sh",  "Щ" => "Sch", "Ь" => "",  "Ы" => "Y", "Ъ" => "", "Э" => "E", "Ю" => "Yu",  "Я" => "Ya");
 
echo $string."<br />";
echo strtr($string, $translit);
}
echo translit();

//**********************Task 9
echo "<br/>";
echo "<br/>";
print("**********************Task9**********************");
echo "<br/>";
function translit2()
{
    $string = "транслит три слова";
 
$translit = array("а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "zh",  "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "kh", "ц" => "c", "ч" => "ch",  "ш" => "sh",  "щ" => "sch", "ь" => "",  "ы" => "y", "ъ" => "", "э" => "e", "ю" => "yu", "я" => "ya", "А" => "A", "Б" => "B", "В" => "V", "Г" => "G", "Д" => "D", "Е" => "E", "Ё" => "E", "Ж" => "Zh",  "З" => "Z", "И" => "I", "Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N", "О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T", "У" => "U", "Ф" => "F", "Х" => "KH", "Ц" => "C", "Ч" => "Ch",  "Ш" => "Sh",  "Щ" => "Sch", "Ь" => "",  "Ы" => "Y", "Ъ" => "", "Э" => "E", "Ю" => "Yu",  "Я" => "Ya", " " => "_");
 
echo $string."<br />";
echo strtr($string, $translit);
}
echo translit2();


//**********************Task 10
echo "<br/>";
echo "<br/>";
echo "<br/>";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operation = $_POST['operation'];
    $reset = $_POST['reset'];

    if ($reset) {
        $view = "";
        $number1 = 0;
        $number2 = 0;
        $operation = false;
        $view = "";
    }

    if ($operation) {
        if ($operation == "+") {
            $result = $number1 + $number2;
        }
        if ($operation == "-") {
            $result = $number1 - $number2;
        }
        if ($operation == "*") {
            $result = $number1 * $number2;
        }
        if ($operation == "/") {
            $result = ($number2 != 0) ? $number1 / $number2 : "Infinity";
        }
        $view = "$number1 $operation $number2 = " . $result;
    }

}

//**********************Task 11
echo "<br/>";
echo "<br/>";
echo "<br/>";
$input_name = 'file';
 
$allow = array();
 
$deny = array(
	'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
	'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
	'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi'
);
 
$path = __DIR__ . '/uploads/';
 
if (isset($_FILES[$input_name])) {
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
 
	$files = array();
	$diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
	if ($diff == 0) {
		$files = array($_FILES[$input_name]);
	} else {
		foreach($_FILES[$input_name] as $k => $l) {
			foreach($l as $i => $v) {
				$files[$i][$k] = $v;
			}
		}		
	}	
	
	foreach ($files as $file) {
		$error = $success = '';
 
		if (!empty($file['error']) || empty($file['tmp_name'])) {
			switch (@$file['error']) {
				case 1:
				case 2: $error = 'Превышен размер загружаемого файла.'; break;
				case 3: $error = 'Файл был получен только частично.'; break;
				case 4: $error = 'Файл не был загружен.'; break;
				case 6: $error = 'Файл не загружен - отсутствует временная директория.'; break;
				case 7: $error = 'Не удалось записать файл на диск.'; break;
				case 8: $error = 'PHP-расширение остановило загрузку файла.'; break;
				case 9: $error = 'Файл не был загружен - директория не существует.'; break;
				case 10: $error = 'Превышен максимально допустимый размер файла.'; break;
				case 11: $error = 'Данный тип файла запрещен.'; break;
				case 12: $error = 'Ошибка при копировании файла.'; break;
				default: $error = 'Файл не был загружен - неизвестная ошибка.'; break;
			}
		} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
			$error = 'Не удалось загрузить файл.';
		} else {
			$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
			$name = mb_eregi_replace($pattern, '-', $file['name']);
			$name = mb_ereg_replace('[-]+', '-', $name);

			$converter = array(
				'а' => 'a',   'б' => 'b',   'в' => 'v',    'г' => 'g',   'д' => 'd',   'е' => 'e',
				'ё' => 'e',   'ж' => 'zh',  'з' => 'z',    'и' => 'i',   'й' => 'y',   'к' => 'k',
				'л' => 'l',   'м' => 'm',   'н' => 'n',    'о' => 'o',   'п' => 'p',   'р' => 'r',
				'с' => 's',   'т' => 't',   'у' => 'u',    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
				'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',  'ь' => '',    'ы' => 'y',   'ъ' => '',
				'э' => 'e',   'ю' => 'yu',  'я' => 'ya', 
			
				'А' => 'A',   'Б' => 'B',   'В' => 'V',    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
				'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
				'Л' => 'L',   'М' => 'M',   'Н' => 'N',    'О' => 'O',   'П' => 'P',   'Р' => 'R',
				'С' => 'S',   'Т' => 'T',   'У' => 'U',    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
				'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',  'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
				'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
			);
 
			$name = strtr($name, $converter);
			$parts = pathinfo($name);
 
			if (empty($name) || empty($parts['extension'])) {
				$error = 'Недопустимое тип файла';
			} elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
				$error = 'Недопустимый тип файла';
			} elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
				$error = 'Недопустимый тип файла';
			} else {
				$i = 0;
				$prefix = '';
				while (is_file($path . $parts['filename'] . $prefix . '.' . $parts['extension'])) {
		  			$prefix = '(' . ++$i . ')';
				}
				$name = $parts['filename'] . $prefix . '.' . $parts['extension'];
 
				if (move_uploaded_file($file['tmp_name'], $path . $name)) {
					$success = 'Файл «' . $name . '» успешно загружен.';
				} else {
					$error = 'Не удалось загрузить файл.';
				}
			}
		}
		
		if (!empty($success)) {
			echo '<p>' . $success . '</p>';		
		} else {
			echo '<p>' . $error . '</p>';
		}
	}
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
   
   
    <title>Laba 7</title>
</head>

<body style="width:50%; margin:0 auto;">

<section>
<form action="" method="post">
   <p>**********************Task 10**********************</p>
    <input name="number1" type="text" value="<?= $number1 ?>"><br><br>
    <input name="number2" type="text" value="<?= $number2 ?>"><br><br>
    <input name="result" type="text" value="<?= $view ?>" disabled/><br><br>

    <select name="operation" onchange="submit()">
        <option value="">Select operation</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>

    <input name="operation" value="+" type="submit"/>
    <input name="operation" value="-" type="submit"/>
    <input name="operation" value="*" type="submit"/>
    <input name="operation" value="/" type="submit"/>
    <input name="reset" value="Reset" type="submit"/>
</form>

<form action="/upload.php" method="post" enctype="multipart/form-data">
 <p>**********************Task 11**********************</p>
	<input type="file" name="file[]" multiple>
	<input type="submit" value="Отправить">
</form>
</section>

</body>
</html>