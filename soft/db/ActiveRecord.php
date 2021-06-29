<?phpnamespace soft\db;use Yii;use Exception;use soft\helpers\ArrayHelper;use yeesoft\multilingual\behaviors\MultilingualBehavior;use yii\base\InvalidArgumentException;use yii\db\ActiveRecord as YiiActiveRecord;/** * @method getTranslations() * @method getMultilingualAttributeLabel(string $attribute) @see MultilingiualBehavior::getMultilingualAttributeLabel() * @method ActiveQuery hasMany($class, array $link) see [[BaseActiveRecord::hasMany()]] for more info * @method ActiveQuery hasOne($class, array $link) see [[BaseActiveRecord::hasOne()]] for more info * * @property-read mixed $translations * @property-read string $error The first error message * @property-read mixed $statusName [[self::getStatusName()]] * * @property-read null|\yeesoft\multilingual\behaviors\MultilingualBehavior $multilingualBehavior * @property-read bool $hasMultilingualBehavior * @property-read array $multilingualAttributes * @property-read bool $hasMultilingualAttributes */class ActiveRecord extends YiiActiveRecord{    use ActiveRecordTrait;    use MultilingualTrait;    const STATUS_INACTIVE = 0;    const STATUS_ACTIVE = 1;    //<editor-fold desc="Methods" defaultstate="collapsed">    public static function statuses()    {        return [            self::STATUS_INACTIVE => Yii::t('site', 'Inactive'),            self::STATUS_ACTIVE => Yii::t('site', 'Active'),        ];    }    /**     * Status holatini ko'rsatish     * DIQQAT: buning uchun jadvalda `status` degan maydon bo'lishi zarur     * @return mixed     */    public function getStatusName()    {        return ArrayHelper::getValue(self::statuses(), $this->status);    }    /**     * @inheritDoc     * @throws Exception     */    public function fields()    {        $fields = parent::fields();        if ($this->hasMultilingualBehavior) {            $fields = array_merge($fields, $this->multilingualAttributes);        }        return $fields;    }    //</editor-fold>    //<editor-fold desc="Attribute labels" defaultstate="collapsed">    public function setAttributeLabels()    {        return [];    }    /**     * @inheritDoc     */    public function attributeLabels()    {        $defaultLabels = [            'name' => Yii::t('site', "Name"),            'title' => Yii::t('site', "Title"),            'text' => Yii::t('site', "Text"),            'description' => Yii::t('site', "Description"),            'content' => Yii::t('site', "Content"),            'image' => Yii::t('site', "Image"),            'status' => Yii::t('site', "Status"),            'user_id' => Yii::t('site', "Author"),            'user.fullname' => Yii::t('site', "Author"),            'created_at' => Yii::t('site', "Created at"),            'updated_at' => Yii::t('site', "Updated at"),            'code' => Yii::t('app', 'Code'),        ];        $modelLabels = $this->setAttributeLabels();        return array_merge($defaultLabels, $modelLabels);    }    /**     * @param string $attribute     * @return string     * @throws Exception     */    public function getAttributeLabel($attribute)    {        if ($this->hasMultilingualBehavior) {            if ($this->multilingualBehavior->isAttributeMultilingual($attribute)) {                return $this->multilingualBehavior->getMultilingualAttributeLabel($attribute);            }        }        return parent::getAttributeLabel($attribute);    }    //</editor-fold>    //<editor-fold desc="For CRUD actions" defaultstate="collapsed">    /**     * @return string the first error text of the model after validating     * */    public function getError()    {        return reset($this->firstErrors);    }    /**     * @return bool     */    public function loadPost()    {        return $this->load(Yii::$app->request->post());    }    /**     * @return bool     */    public function loadSave()    {        return $this->load(Yii::$app->request->post()) && $this->save();    }    /**     * @return bool     */    public function loadValidate()    {        return $this->load(Yii::$app->request->post()) && $this->validate();    }    //</editor-fold>    //<editor-fold desc="Multilingual behavior" defaultstate="collapsed">    /**     * languages list for multilingual behavior. For more details refer     *  [[yeesoft/multilingual]] extension     * */    public function languages()    {        return Yii::$app->params['languages'];    }    /**     * @return \yeesoft\multilingual\behaviors\MultilingualBehavior|null     */    public function getMultilingualBehavior()    {        return $this->getBehavior('multilingual');    }    /**     * @return bool     */    public function getHasMultilingualBehavior()    {        return $this->multilingualBehavior != null;    }    /**     * @return array     */    public function getMultilingualAttributes()    {        return $this->hasMultilingualBehavior ? $this->multilingualBehavior->attributes : [];    }    /**     * @return bool     */    public function getHasMultilingualAttributes()    {        return !empty($this->multilingualAttributes);    }    /**     * Check if $attribute is multilingual attribute     * @param $attribute     * @return bool     */    public function isMultilingualAttribute($attribute)    {        return in_array($attribute, $this->multilingualAttributes);    }    /**     * Check if $name is attribute     * @param $name     * @return bool     */    public function isAttribute($name)    {        if ($name) {            return parent::hasAttribute($name) || $this->isMultilingualAttribute($name);        } else return false;    }    /**     * Generates multilingual attributes with language prefix by given attribute.     * For instance, if $attribute value is 'name', result would be ['name_uz', 'name_en', ...]     * @param mixed $attribute multilingual attribute     * @return array|false multilingual attributes with language prefix     * @throws \Exception     */    public function generateMultilingualAttributes($attribute)    {        if (!$this->isMultilingualAttribute($attribute)) {            throw new InvalidArgumentException("Attribute '" . $attribute . "' is not multilingual attribute");        }        $result = [];        foreach ($this->languages() as $key => $value) {            $result[] = $attribute . "_" . $key;        }        return $result;    }    //</editor-fold>}