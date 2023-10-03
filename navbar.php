<style>
    .navbar{
    background-color: ;
    font-family: 'Poppins',sans-serif;
    color: white;
    list-style: none;
    display: block;
    line-height: 3rem;
    text-transform: capitalize;
    cursor: pointer;
    margin-left: 4rem;
    margin-bottom: 1.5rem;
    position: relative;
}

.navbar ul{
    position: absolute;
    background-color: black;
    color: ;
    width: 20vw;
    height: 40rem;
    list-style: none;
    left: -100%;
    transition: 0.5s;
    display: table-cell;
}

#click:checked ~ ul{
    left: 0;
    transition: 0.5s;
    position: static;
}



.navbar ul li{
    margin-left: 2rem;
}

.navbar ul a{
    text-decoration: none;
    color: white;
}

#btn{
    font-size: 25px;
    margin-left: 20px;
    position: absolute;
    
    margin-top: -3rem;
}

#click{
    display: none;
}

.type1{
   font-size: 12px;
}

.type1 i{
    color: red;
}

.type2{
    font-size: 12px;
    margin-top: 1.9rem;
    margin-left: -7px;
    position: absolute;
    display: flex;
    justify-content: space-between;
}

.type_1{
    display: flex;
    justify-content: space-between;
}

.type3{
    font-size: 12px;
    margin-top: -3rem;
    margin-left: 4rem;
}

.type4{
    font-size: 12px;
    margin-top: -1.1rem;
}

.type_2{
    position: absolute;
    margin-left: 7rem;
}

.GType{
    margin-top: 2rem;
}

.type5{
    margin-top: 0.9rem;
}

#typ{
    color: red;
}

#typ1{
    color: yellow;
}

#typ2{
    color: #7CFC00;
}

#typ3{
    color: #00FFFF;
}

#typ4{
    color: 	#FBCEB1;
}

#typ5{
    color: 	#DE3163;
}

#typ6{
    color: 	#FF00FF;
}

#typ7{
    color: 	#FFBF00;
}

#typ8{
    color: 	#D4E157 ;
}

#typ9{
    color: 	#0288D1;
}

#typ10{
    color: 	#FF3333;
}

#typ11{
    color: 	#8B008B;
}

#typ12{
    color: 	#00CED1;
}

#typ13{
    color: 	#7CFC00;
}

#typ14{
    color: 	#F33A6A;
}

#typ15{
    color: 	#DFFF00;
}

#typ16{
    color: 	#7CFC00;
}

#typ17{
    color: 	#808000;
}

#typ18{
    color: 	#9932CC;
}

#typ19{
    color: 	#FF3333 ;
}

#typ20{
    color: 	#3365FF ;
}

#typ21{
    color: 	#33B9FF;
}

#typ22{
    color: 	#33FFA1 ;
}

#typ23{
    color: 	#3AFF33;
}

#typ24{
    color: 	#9AFF33;
}

#typ25{
    color: 	#FFB133 ;
}

#typ26{
    color: #FF6633;
}

#typ27{
    color: 	#33FFB6;
}

#typ28{
    color: 	#4C33FF;
}

#typ29{
    color: 	#FF33DB ;
}

#typ30{
    color: #76FF33 ;
}

#typ31{
    color: 	#33B9FF;
}



@media (max-width: 425px) {
    #btn{
        font-size: 19px;
        margin-left: -2rem;
        margin-top: -2.5rem;
    }
}

@media (max-width: 375px) {
    /* Add styles for smaller screens here */
    #btn{
        margin-left: -3rem;
    }

    .navbar ul{
        display: table-cell;
        
    }
    
    
}

@media (max-width: 320px) {
    /* Add styles for smaller screens here */
    .navbar ul{
        display: table-cell;
    }
}

@media (max-width: 320px) {
    /* Add styles for smaller screens here */
    .navbar ul{
        left: -200%;
        display: table-cell;
    }
}


</style>

<div class="navbar">
    <nav>
        <input type="checkbox" id="click">
        <label for="click"><i class="fa-solid fa-bars" class="click_btn" id="btn"></i></label>
        <ul>
            <li><a href="index"><i class="fa-solid fa-house"></i> home</a></li>
            <li><a href=""><i class="fa-solid fa-fire"></i> Type</a></li>
            <div class="type_1">
            <li class="type1"><a href="#" id="typ1">Tv Series</a></li>
            <li class="type2"> <a href="movie" id="typ2">Movies</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="#" id="typ">Ova</a></li>
            <li class="type4"><a href="popular" id="typ3">Popular</a></li>
            </div>
            <li class="GType"><i class="fa-regular fa-star"></i></i> Genres</a></li>
            <div class="type_1">
            <li class="type1"><a href="action" id="typ4"> Action</a></li>
            <li class="type2"><a href="movie" id="typ5"> Adventure</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="cars" id="typ6">Cars</a></li>
            <li class="type4"><a href="comedy" id="typ7">Comedy</a></li>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="dementia" id="typ8"> 
Dementia</a></li>
            <li class="type2"><a href="demons" id="typ9"> Demons</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="drama" id="typ10">Drama</a></li>
            <li class="type4"><a href="dub">
Dub</a></li>
            </div>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="#" id="typ11"> 
Ecchi</a></li>
            <li class="type2"><a href="fantasy" id="typ12"> Fantasy</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="game" id="typ13">
Game</a></li>
            <li class="type4"><a href="harem" id="typ14">
Harem</a></li>
            </div>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="historical" id="typ15"> Historical</a></li>
            <li class="type2"><a href="horror" id="typ16"> Horror</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="josei" id="typ17">
Josei
</a></li>
            <li class="type4"><a href="kids" id="typ18">Kids</a></li>
            </div>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="magic" id="typ19"> 
Magic</a></li>
            <li class="type2"><a href="martial-arts" id="typ20"> 
Martial Arts</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="mecha" id="typ21">Mecha</a></li>
            <li class="type4"><a href="military" id="typ22">
Military</a></li>
            </div>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="music" id="typ23"> 
Music</a></li>
            <li class="type2"><a href="mystery" id="typ24"> Mystery</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="parody" id="typ25">
Parody</a></li>
            <li class="type4"><a href="police" id="typ26">
Police</a></li>
            </div>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="psychological" id="typ27"> Psychological</a></li>
            <li class="type2"><a href="rom" id="typ28"> Romance</a></li>
            </div>
            <div class="type_2">
            <li class="type3"><a href="samurai" id="typ29">
Samurai</a></li>
            <li class="type4"><a href="school" id="typ30">School</a></li>
            </div>
            </div>
            <div class="type5">
            <div class="type_1">
            <li class="type1"><a href="sci-fi" id="typ31"> Sci-Fi</a></li>
            
            </div>
            
        </ul>
    </nav>
</div>
