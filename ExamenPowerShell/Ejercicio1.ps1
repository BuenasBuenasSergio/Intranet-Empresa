$date = Get-Date 

Set-Location C:\Users\Alumno\Desktop
$archivos = Get-ChildItem -Path C:\Windows\INF -Force -File  `
| Where-Object {($_.Name -like "C*" -or $_.Name -like "A*" -or $_.Name -like "M*") -and $_.LastWriteTime.Year -gt "2019"} `
|ConvertTo-Html -Title "Archivos C:\Windows\INF " -Head "<h1>Listado C:\Windows\INF</h1>" -Property  Name, BaseName, CreationTime, IsReadOnly, Length  |Format-Table -AutoSize  |Out-File output.html  


"Autor: " + $env:USERDOMAIN + " Dia " + $date.DayOfWeek +"/" + $date.Month +"/" + $date.Year |Out-File .\output.html -Append

Invoke-Item “output.html"



