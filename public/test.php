<?php 

shell_exec('export HOME=/ && libreoffice --headless -convert-to pdf --outdir ./ /pdfdraft/public_html/public/doc.docx');