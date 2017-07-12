<?php 
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFormFile extends Model
{
    public $file;
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file']
        ];
    }
   public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs(Yii::getAlias('@frontend') . '/web/uploads/book/'. $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }
}