<?php


namespace Command;

use Command\Commands\Command;
use Error;

class Editor
{
  const COPY = 'Copy';
  const CUT = 'Cut';
  const PASTE = 'Paste';
  private array $commands = [];


  public function perform(File $file, string $commandName)
  {
    $command = $this->getCommand($file, $commandName);
    $command->execute();

    if ($command->isRevocable()) {
      $this->commands[] = $command;
    }
  }

  public function undo(int $count)
  {
    for ($i = 0; $i < $count; $i++) {
      $command = array_pop($this->commands);
      $command->undo();
    }
  }

  public function openFile(string $filename): File
  {
    if (!file_exists($filename)) {

      return $this->createFile($filename);
    }

    $content = file_get_contents($filename);

    if ($content === false) {
      throw new Error('Fail to read file.');
    }

    return new File($filename, $content);
  }

  public function createFile($filename): File
  {
    $result = file_put_contents($filename, '');

    if ($result === false) {
      throw new Error('Unable to create file ' . $filename);
    }

    return new File($filename, '');
  }

  public function saveFile(File $file, string $filename = null)
  {
    $filename ??= $file->getFilename();
    $error = file_put_contents($filename, $file->content);

    if ($error === false) {
      throw new Error('Save file error.');
    }
    echo "File saved." . PHP_EOL;
  }

  public function saveFileAs(File $file, string $filename)
  {

    $this->saveFile($file, $filename);
  }

  public function moveCursor(File $file, int $position): void
  {
    $file->moveCursor($position);
  }

  public function selectFragment(File $file, int $start, int $end): void
  {
    $file->selectFragment($start, $end);
  }

  private function getCommand(File $file, string $commandName): Command
  {
    $classname = "Command\Commands\\" . $commandName . "Command";

    if (!class_exists($classname)) {
      throw new Error('Unexpected command: ' . $commandName);
    }

    return new $classname($file);
  }
}
