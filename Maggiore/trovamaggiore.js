$(document).ready( function() {

   var contamosse=0;
   var blocca=false;
   var prec=-1;

   nuovo = document.createElement('div');
   nuovo.setAttribute('id', 'conta');
   nuovo.setAttribute('class', 'casella');
   $("body").append(nuovo);
   $('#conta').css({ 'background-color':'rgb(255,200,255)', 'left':'10', 'top':'10'  });
   $('#conta').html("mosse:"+contamosse);
   
   nuovo = document.createElement('div');
   nuovo.setAttribute('id', 'reset');
   nuovo.setAttribute('class', 'casella');
   $("body").append(nuovo);
   $('#reset').css({ 'background-color':'rgb(200,200,255)', 'left':'225', 'top':'10'  });
   $('#reset').html("reset");

   zx=10;
   zy=10;
   for(j=0;j<zy;j++)
   {
      for(i=0;i<zx;i++)
      {
         nuovo = document.createElement('div');
         nuovo.setAttribute('id', 'd_'+i+'_'+j);
         nuovo.setAttribute('class', 'miediv');
         nuovo.setAttribute('valore', 0);
         $("body").append(nuovo);

         l=10+(i*42);
         t=80+(j*42);

         $('#d_'+i+'_'+j).css({ 'left':l,'top':t });

         v=Math.floor(Math.random()*99+1);        
         $('#d_'+i+'_'+j).attr('valore',v*1);

         $('#d_'+i+'_'+j).click( function() {
			if(!blocca)
            {			
               var ov=$(this).attr('valore')*1;
               if(ov>prec)
               {				   
                  $(this).css({ 'background-color':'rgb(0,150,0)'});
			      $(this).html($(this).attr('valore'));
			      contamosse++;
                  $('#conta').html("mosse:"+contamosse);
				  prec=ov;
			   }
               else
               {
                  $(this).css({ 'background-color':'rgb(255,0,0)'});
			      $(this).html($(this).attr('valore'));
				  blocca=true;
		       } 
			}
         });
      }
   }
   
   $('#reset').click( function() {
      contamosse=0;
	  blocca=false;
	  prec=-1;
      $('#conta').html("mosse:"+contamosse);

      for(j=0;j<zy;j++)
      {
         for(i=0;i<zx;i++)
         {
            v=Math.floor(Math.random()*99+1);        
            $('#d_'+i+'_'+j).attr('valore',v*1);
            $('#d_'+i+'_'+j).css({ 'background-color':'rgb(0,0,0)'});
  		    $('#d_'+i+'_'+j).html("");
	     }
      }	  
    });	   
  
});