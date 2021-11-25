pertama yang kita lakukan adalah membuat create database dengan nama kdigital menggunakan query dibawah ini di sqlyog
`create database rakamin`

kedua kita migrate database menggunakan cmd di folder kdigital tersebut menggunakan perintah seperti dibawah ini di cmd
`php artisan migrate`

ketiga kita run laravel tersebut dengan perintah seperti ini yang kita gunakan di cmd
`php artisan serve`


GET http://127.0.0.1:8000/api/list

## Responses

List returns a JSON response in the following format:

```javascript
{
    "success": true,
    "message": "List User",
    "result": [
        {
            "id": 1,
            "nama": "Nesta"
        }
    ]
}
```


POST http://127.0.0.1:8000/api/store

| Parameter | Type | 
| :--- | :--- | 
| `nama` | `string` |

## Responses
```javascript
{
    "success": true,
    "message": "User berhasil ditambahkan."
}
```


POST http://127.0.0.1:8000/api/kirim
| Parameter | Type | 
| :--- | :--- | 
| `message` | `string` |
| `pengirim` | `integer` |
| `penerima` | `integer` |

## Responses
```javascript
{
    "success": true,
    "message": "Pesan berhasil dikirim."
}
```


POST http://127.0.0.1:8000/api/daftarchat/{id}
| Parameter | Type | 
| :--- | :--- | 
| `id` | `integer` |->user yang diinginkan

## Responses
```javascript
{
    "success": true,
    "message": "List Chat",
    "result": [
        {
            "message": "Hy Joni",
            "penerima": "joni"
        },
        {
            "message": "Hy rian",
            "penerima": "rian"
        }
    ]
}
```


GET http://127.0.0.1:8000/api/percakapan/{id}/{tujuan percakapan}
## Responses
```javascript
{
    "success": true,
    "message": "List Percakapan",
    "result": [
        {
            "message": "Hy rian",
            "penerima": "rian"
        },
        {
            "message": "Hy Nesta",
            "penerima": "nesta"
        },
    ]
}
```
