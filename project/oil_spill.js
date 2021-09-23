function oilspill(click){
    var details = document.getElementById("oil_spill_details");
    if (click==1){
        details.innerHTML = "In California, 1910, the Lakeview Well broke, spilling 378 million gallons of oil over a span of 18 months. Thankfully, due to \
        volunteers building dikes by hand, most of the oil did not reach the water and environmental damage was minimal.";
    }
    if (click==2){
        details.innerHTML = "In the Persian Gulf during the Gulf War, 240 million gallons of oil were spilled. \
        The spill was done maliciously by Iraqi forces in order to stop US troops from landing on the beach. Unfortunately, this \
        oil spill caused extensive marine damage.";
    }
    if (click==3){
        details.innerHTML = "This oil spill was caused by the explosion of the Deepwater Horizon oil rig near the Gulf of Mexico. \
        The explosion released 210 million gallons of oil into the Gulf of Mexico. Hundreds of thousands of animals were affected by the spill, along with \
        about 1,100 miles of coastline. The spill cost BP more than $65 billion.";
    }
}