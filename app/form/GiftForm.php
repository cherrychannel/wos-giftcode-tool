class GiftForm extends Ethna_ActionForm
{
    var $form = [
        'fid' => [
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXT,
            'name' => 'FID',
            'required' => true,
        ],
        'giftcode' => [
            'type' => VAR_TYPE_STRING,
            'form_type' => FORM_TYPE_TEXT,
            'name' => 'ギフトコード',
            'required' => true,
        ],
    ];
}
