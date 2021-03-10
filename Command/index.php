<?php
/*
 * Команда: вы — разработчик продукта Macrosoft World.
 * Это текстовый редактор с возможностями копирования, вырезания и вставки текста (пока только это).
 * Необходимо реализовать механизм по логированию этих операций и возможностью отмены и возврата действий.
 * Т.е., в ходе работы программы вы открываете текстовый файл .txt,
 * выделяете участок кода (два значения: начало и конец) и выбираете, что с этим кодом делать.
 *
 * копирования
 * вырезания
 * вставки
 */

include dirname(__DIR__) . '/Autoloader/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);

use Command\Editor;


function testCommand(string $filename)
{

  $editor = new Editor(); // Invoker
  $file = $editor->openFile($filename); // Receiver

  $editor->selectFragment($file, 229, 244);
  $editor->perform($file, Editor::COPY); 
  $editor->moveCursor($file, 0);
  $editor->perform($file, Editor::PASTE);

  $editor->selectFragment($file, 89, 244);
  $editor->perform($file, Editor::CUT);

  $editor->perform($file, Editor::PASTE);
  $editor->perform($file, Editor::PASTE);
  $editor->undo(2);

  $editor->saveFileAs($file, 'my_files/test4.txt');
}
$filename = 'my_files/test3.txt';
testCommand($filename);
