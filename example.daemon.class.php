<?php
class ExampleDaemon extends Daemon
{
   	
   public function __contruct()
   {
      parent::Daemon();

      $fp = fopen('/tmp/daemon.log', 'a');
      fclose($fp);
   
      chmod('/tmp/daemon.log', 0777);
   }

   protected function _logMessage($msg, $status = DLOG_NOTICE)
   {
	
	  // @TODO replace with log4php 
	  // this is a more efficient and standard way of logging     	
		
      if ($status & DLOG_TO_CONSOLE)
      {
         print $msg."\n";
      }
      
      $fp = fopen('/tmp/daemon.log', 'a');
      fwrite($fp, date("Y/m/d H:i:s ").$msg."\n");
      fclose($fp);
   }

   protected function _doTask()
   {
      static $i = 0;
   
      sleep(1);
   
      $i++;
   
      if ($i >= 30)
      {
         $this->stop();
      }
   }

}
?>