<?php namespace Haruncpi\QueryLog\Supports;

use Haruncpi\QueryLog\Contracts\FileWritable;

class SimpleTextLogFileWriter implements FileWritable
{
    private $file_path;

    private $base;

    public function __construct()
    {
      $this->base = new TextLogFileWriter;
    }

    public function write($file_path, $data)
    {
      $alteredQueries = [];

      foreach ($data['queries'] as $query)
      {
        $alteredQuery = [];
          foreach ($query as $key => $value)
          {
            if (in_array($key, ['final_query', 'time'])
            {
              $alteredQuery[$key] = $value;
            }
          }
      }

      $data['queries'] = $alteredQueries;

      $this->base->write($file_path, $data);
    }
}
