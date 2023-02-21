from django.shortcuts import render
from django.views.decorators.csrf import csrf_exempt
from django.http import JsonResponse
import pdfkit
import bs4 #manage html files
import os

# Create your views here.
@csrf_exempt
def gerarRelatorioCurso(request):
	stack = []

	# initialize the data dictionary to be returned by the request
	data = {"success": True}
	module_dir = os.path.dirname(__file__)  # get current directory
	file_path = os.path.join(module_dir, 'relatorio_disciplina.html')

	# load the file
	with open(file_path) as inf:
		txt = inf.read()
		soup = bs4.BeautifulSoup(txt)

	# # create new link
	# new_link = soup.new_tag("link", rel="icon", type="image/png", href="img/tor.png")
	# # insert it into the document
	# soup.head.append(new_link)

	

	#pill taken or not
	# pill_Taken = None
	# user = None

	# check to see if this is a post request
	if request.method == "POST":
		idcurso_post = request.GET.get("id_curso", None)
		paragrafo = soup.find("p", id="paragrafo")
		paragrafo.string = 'Vamo testar esse trem ihuu'

		# save the file again
		with open(file_path, "w") as outf:
			outf.write(str(soup))
		
		# check to see if an image was uploaded
		# if request.FILES.get("video", None) is not None:
		# 	# grab the uploaded video
		# 	#print("primeiro",type(image))
		# 	myFile = request.FILES['video']
		# 	fs = FileSystemStorage()

		# 	if fs.exists(myFile.name):
		# 		return HttpResponse(status=200)

		# 	filename = fs.save(myFile.name, myFile) #nome do original
		# 	mediaPath = '{base_path}/media/'.format(base_path=os.path.abspath(os.path.dirname(__file__)))
		# 	urlfilename = filename #nome do original
		# 	filename = mediaPath+filename # nome do original + absolute path

		# 	webmfilename = urlfilename.split(".")[0]+".webm" # tira o .crip1900 e coloca o .webm, mas somente no nome! sem path!
		# 	mediaPath2 = '/var/www/html/assets/media/' #novo path
		# 	webmpathfilename = mediaPath2+webmfilename # adiciona o path aqui de novo

		# 	subprocess.call(["sudo","webm","-i",filename,"-vp8", webmpathfilename])
		# 	urlname_post = 'http://200.144.245.18/assets/media/'+webmfilename
		# 	iduser_post = request.POST.get('iduser', '');
		# 	datetime_post = request.POST.get('datetime', datetime.datetime.now());
		# 	idmanager = request.POST.get('downloadblock', '');
		# 	joined_post = request.POST.get('joined', '');

			#busca o usuário no banco de dados
			# try:
			# 	user = Users.objects.get(iduser=iduser_post)
			# 	if(user.active ==1):
			# 		print(pill_Taken)
			# 		Media(url = urlname_post, iduser = iduser_post, datetime = datetime_post, idmanager = idmanager, validated=pill_Taken, joined=joined_post).save()
			# 		# update the response
			# 		data.update({"response": pill_Taken, "success": True})
			# 	else:
			# 		print("Usuario inativo")
			# 		fs.delete(filename)
			# 		return HttpResponse(status=401)

			# except ObjectDoesNotExist:
			# 	print("Usuario não existente")
			# 	fs.delete(filename)
			# 	return HttpResponse(status=401)
		return JsonResponse(data)
		# else:
		# 	#se o video vier nulo, ele retorna 200 (porque o app vai reconhecer ele como ok, e vai apagá-lo)
		# 	return HttpResponse(status=200)

	# return a JSON response
	return JsonResponse(data)
