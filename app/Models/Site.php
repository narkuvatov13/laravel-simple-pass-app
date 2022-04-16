<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'name',
        'username',
        'password',
        'img',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE) {
            return $value;
        }
       // https://bilisim-images.s3.us-east-1.amazonaws.com/images/4SB8jOfavimcAeGMKzXE9PlbejQ9ErozqAwKpVlf.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEPD%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCWV1LXdlc3QtMiJIMEYCIQDsWNc1yU0f4S%2Bv39ZITk8VpV6xfVp%2BKZA7q7ya4sIepgIhAPSfg2XGgedDEASEHbYvyA1R%2BrXzu%2BfabViTmbm%2BOx1tKu0CCJn%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEQABoMMzIyOTU1NDIwNDgyIgzr5%2BImYprtJVvkIJ8qwQJsTdxI115ITHGLxBlRI842yGLZpFrmQ7VupzXVN3pDiw9DRaiOUUsmVTUUApv36qw%2BeFaKSrVJFSCJQG7oyREjYHTQjASPJQ7u5oRJomJqY%2FcsH7NeOMMKnjt58I4L2CE%2FnPtx%2FZaVvajGoez26A%2Fb6NweCLfoVs3FseQg3Z49MyPsx0eoA8oUwph0hUv6o1gOTdTZQdzdeQAoZwlezDhGQddCnBOCQoBkCmM4SFPQvB7wNZV7t5X%2FGGyEVPfcZsKqHAd%2FtwyAk3MIHyZ4MuTjJ6u3nO9DCEANjSy2i0Wrs%2Fzli335Vyb6z2ZfgPIAJ9ADCtkd4d2xTaNO0zgS0sPVv1fcGxHDAINW8Sv425sh5CwucJQCim4ueU98qyDvD8R0Caf%2BNpev%2FDCkIQ5SpWzKxmr%2FBAmbikvVBl5ZvzfTXb8wvJPokgY6sgKvKYTw65Tm7%2FiDN%2FJxFSLMm%2FM5NNkdq4HxEBMFqTg2tLXwWEicwE6azYhBUQzbc5N7k%2FpdfdHFO8hAgadd3VlZvgTgtmDlwhu2xVPsCCa0jqswh4QSgs0pQKV09d0K6mhL3zxqC2TasHN83cG8HLlN6dtyLiluhRjozHbR3BfRvl%2BINC1HiqBKt0uMxn4Erl5MC0i40mw67Q1rG1b9uTblx0i2u9FwkR1N6gUWn1YqLiepThRp6wPu4dh5LnTIhqMwtHrE65EZ%2FnkDGZI%2FNRrN8wB9iZOxGDiPtJf977xdO2c7jiXEJYBalLNPo1IZh44tQApW7Ijlq7%2FUKRDeOOmfptAREGLwSWUCR46kBoCl15VQOiTgjWaYZco1YT4%2FoyoCPvPbPxzsYnQHc6MsXHG4G%2BI%3D&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20220416T024433Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAUWMNEUNBD32NQUYS%2F20220416%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Signature=9ede87a07a1c4c9701e1f174b75bcb4527de1f0c01d7b6edb52c37099ea95311
        //https://bilisim-images.s3.amazonaws.com/images/4SB8jOfavimcAeGMKzXE9PlbejQ9ErozqAwKpVlf.png
        return asset('storage/' . $value);
    }
}
