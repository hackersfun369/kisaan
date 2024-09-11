const schemes = [
    {
        name: "Pradhan Mantri Kisan Samman Nidhi (PM-KISAN)",
        purpose: "Provides financial support of ₹6,000 per year to landholding farmers.",
        eligibility: "All landholding farmers are eligible, but certain categories like institutional landholders and income tax payers are excluded.",
        price: "₹6,000 per year, paid in three installments of ₹2,000 every four months.",
        rules: [
            "Farmers or any family member should not have paid income tax in the previous assessment year.",
            "Institutional landholders and families with members holding constitutional posts are excluded."
        ],
        officialWebsite: "https://pmkisan.gov.in"
    },
    {
        name: "Pradhan Mantri Kisan Maan-Dhan Yojana (PM-KMY)",
        purpose: "Offers a monthly pension of ₹3,000 to small and marginal farmers upon reaching the age of 60.",
        eligibility: "Farmers aged between 18 to 40 years can enroll by contributing a monthly subscription.",
        price: "Monthly pension of ₹3,000 after the age of 60.",
        rules: [
            "Farmers must contribute a monthly subscription based on their age at the time of enrollment.",
            "Applicable only for small and marginal farmers with a landholding of up to 2 hectares."
        ],
        officialWebsite: "https://pmkmy.gov.in"
    },
    {
        name: "Pradhan Mantri Krishi Sinchai Yojana (PMKSY)",
        purpose: "Aims to enhance irrigation coverage and ensure water availability for agriculture.",
        eligibility: "Farmers with agricultural land can apply for assistance.",
        price: "Varies based on the specific component and the farmer's landholding.",
        rules: [
            "Farmers must have a valid land record document to apply for assistance.",
            "Prioritizes areas with high agricultural potential and low irrigation coverage."
        ],
        officialWebsite: "https://pmksy.gov.in"
    },
    {
        name: "National Agriculture Market (eNAM)",
        purpose: "An online trading platform to facilitate the sale of agricultural products across India.",
        eligibility: "Farmers and traders registered in the Agricultural Produce Market Committee (APMC) can participate.",
        price: "No direct financial benefit, but farmers can potentially get better prices for their produce.",
        rules: [
            "Farmers must have a valid APMC registration to participate.",
            "Traders must also be registered with the APMC."
        ],
        officialWebsite: "https://enam.gov.in"
    },
    {
        name: "Pradhan Mantri Fasal Bima Yojana (PMFBY)",
        purpose: "Provides crop insurance to safeguard farmers against crop loss due to natural calamities.",
        eligibility: "All farmers growing notified crops in the notified areas are eligible.",
        price: "Premium rates vary based on the crop and the area.",
        rules: [
            "Farmers must enroll before the specified deadline for each crop season.",
            "Crop loss claims must be filed within a specific timeframe after the occurrence of the insured risk."
        ],
        officialWebsite: "https://pmfby.gov.in"
    },
    {
        name: "Soil Health Card Scheme",
        purpose: "Provides farmers with information on soil health and nutrient management.",
        eligibility: "All farmers can apply for a soil health card through local agricultural offices.",
        price: "No direct financial benefit, but farmers can optimize fertilizer usage.",
        rules: [
            "Farmers must provide relevant information about their land and farming practices.",
            "Soil health cards are issued every 2 years."
        ],
        officialWebsite: "https://soilhealth.dac.gov.in"
    },
    {
        name: "Agriculture Infrastructure Fund",
        purpose: "Provides financial support for agricultural infrastructure projects.",
        eligibility: "Farmers, cooperatives, and agribusinesses can apply for loans.",
        price: "Loans at an interest rate of 3% per annum.",
        rules: [
            "Applicants must submit a detailed project report.",
            "Loan amount can range from ₹2 crores to ₹100 crores."
        ],
        officialWebsite: "https://agricoop.nic.in"
    },
    {
        name: "National Mission for Sustainable Agriculture (NMSA)",
        purpose: "Enhances productivity in agriculture through sustainable practices.",
        eligibility: "Farmers engaged in sustainable agricultural practices can participate.",
        price: "Financial assistance varies based on the specific component.",
        rules: [
            "Farmers must adopt sustainable practices.",
            "Assistance is provided for activities like soil health management."
        ],
        officialWebsite: "https://nmsa.dac.gov.in"
    },
    {
        name: "Rainfed Area Development (RAD)",
        purpose: "Promotes integrated farming systems in rainfed areas.",
        eligibility: "Farmers in designated rainfed areas can apply for support.",
        price: "Financial assistance varies based on the specific farming system.",
        rules: [
            "Farmers must have land records to prove ownership.",
            "The scheme supports activities like crop-livestock integration."
        ],
        officialWebsite: "https://rkvy.nic.in"
    },
    {
        name: "Micro Irrigation Fund (MIF)",
        purpose: "Aims to promote micro-irrigation systems to increase water efficiency.",
        eligibility: "Farmers can access funds for implementing micro-irrigation technologies.",
        price: "Financial assistance up to 5% of the project cost.",
        rules: [
            "Farmers must have a valid land record document.",
            "Prioritizes areas with high water scarcity."
        ],
        officialWebsite: "https://pmksy.gov.in"
    }
];
// index.js
document.addEventListener('DOMContentLoaded', () => {
    const govtSchemeCon = document.getElementById('Govt-Schemes-con');

    // Assuming 'schemes' is an array of scheme objects
    const topThreeSchemes = schemes.slice(0, 3);

    // Populate the top three schemes
    topThreeSchemes.forEach(scheme => {
        const schemeDiv = document.createElement('div');
        schemeDiv.classList.add('scheme');
        schemeDiv.innerHTML = `
            <img src="https://pmkisan.gov.in/new_images/SabkaSathSabkaVikasSabkaViswas.jpg" alt="${scheme.name}">
            <a href="${scheme.officialWebsite}" target="_blank">${scheme.name}</a>
            <p><strong>Purpose:</strong> ${scheme.purpose}</p>
            <p><strong>Eligibility:</strong> ${scheme.eligibility}</p>
            <h3>Rules</h3>
            <p>${scheme.rules.join(', ')}</p>`;

        govtSchemeCon.appendChild(schemeDiv);
    });
});

// schemes.js
document.addEventListener('DOMContentLoaded', () => {
    const govtschemes = document.getElementById('govtschemes');

    // Check if the govtschemes element exists before populating
    if (govtschemes) {
        schemes.forEach(scheme => {
            const schemeDiv = document.createElement('div');
            schemeDiv.classList.add('scheme');
            schemeDiv.innerHTML = `
                <img src="https://pmkisan.gov.in/new_images/SabkaSathSabkaVikasSabkaViswas.jpg" alt="${scheme.name}">
                <a href="${scheme.officialWebsite}" target="_blank">${scheme.name}</a>
                <p><strong>Purpose:</strong> ${scheme.purpose}</p>
                <p><strong>Eligibility:</strong> ${scheme.eligibility}</p>
                <h3>Rules</h3>
                <p>${scheme.rules.join(', ')}</p>`;

            govtschemes.appendChild(schemeDiv);
        });
    }
});

// Array of disaster management schemes for farming with official websites
const disasterManagementSchemes = [
    {
        name: "Pradhan Mantri Kisan Samman Nidhi (PM-KISAN)",
        purpose: "Provides financial support of ₹6,000 per year to landholding farmers.",
        eligibility: "All landholding farmers are eligible.",
        price: 6000, // Amount offered by the government
        rules: [
            "Farmers must have valid land records.",
            "Farmers or any family member should not have paid income tax in the previous assessment year."
        ],
        website: "https://pmkisan.gov.in"
    },
    {
        name: "Pradhan Mantri Fasal Bima Yojana (PMFBY)",
        purpose: "Comprehensive crop insurance scheme protecting farmers against crop loss due to natural disasters.",
        eligibility: "All farmers growing notified crops in notified areas are eligible.",
        price: "Varies based on the crop and area; government subsidizes a portion of the premium.",
        rules: [
            "Farmers must enroll for the scheme before the specified deadline for each crop season.",
            "Crop loss claims must be filed within a specific timeframe after the occurrence of the insured risk."
        ],
        website: "https://pmfby.gov.in"
    },
    {
        name: "Aapda Mitra Scheme",
        purpose: "Trains and equips volunteers in disaster response, particularly in rural areas.",
        eligibility: "Community volunteers in disaster-prone areas.",
        price: "Financial outlay of ₹369.40 crore.",
        rules: [
            "Volunteers must undergo training provided by the government.",
            "Community Emergency Essential Resource Reserve (EERR) is created at the District / Block level."
        ],
        website: "https://ndma.gov.in"
    },
    {
        name: "National Agricultural Insurance Scheme (NAIS)",
        purpose: "Provides insurance coverage and financial support to farmers in the event of crop failure due to natural calamities.",
        eligibility: "Farmers growing notified crops in notified areas.",
        price: "Varies based on the crop and area.",
        rules: [
            "Farmers must submit claims within the specified time after crop loss.",
            "Must have valid land records."
        ],
        website: "https://pmfby.gov.in"
    },
    {
        name: "Soil Health Card Scheme",
        purpose: "Provides farmers with information on soil health and nutrient management.",
        eligibility: "All farmers can apply through local agricultural offices.",
        price: "No direct financial assistance; free soil testing.",
        rules: [
            "Farmers must provide relevant information about their land.",
            "Soil health cards are issued every 2 years."
        ],
        website: "https://soilhealth.dac.gov.in"
    },
    {
        name: "National Mission for Sustainable Agriculture (NMSA)",
        purpose: "Enhances productivity in agriculture through sustainable practices.",
        eligibility: "Farmers engaged in sustainable agricultural practices.",
        price: "Financial assistance varies based on the specific component.",
        rules: [
            "Farmers must adopt sustainable practices.",
            "Assistance is provided for activities like soil health management."
        ],
        website: "https://nmsa.dac.gov.in"
    },
    {
        name: "Drought Management Plan",
        purpose: "Framework to address drought impacts on agriculture.",
        eligibility: "Farmers in drought-prone areas.",
        price: "Varies based on the state and specific measures.",
        rules: [
            "Farmers must implement water conservation measures.",
            "Regular monitoring of water resources is required."
        ],
        website: "https://ndma.gov.in"
    },
    {
        name: "Flood Management Program",
        purpose: "Aims to reduce the risk and impact of floods on agriculture.",
        eligibility: "Farmers in flood-prone regions.",
        price: "Varies based on the project; funding provided by the government.",
        rules: [
            "Farmers must participate in community flood preparedness programs.",
            "Emergency response plans should be established."
        ],
        website: "https://ndma.gov.in"
    },
    {
        name: "Agriculture Infrastructure Fund",
        purpose: "Provides financial support for agricultural infrastructure projects.",
        eligibility: "Farmers, cooperatives, and agribusinesses.",
        price: "Loans at an interest rate of 3% per annum.",
        rules: [
            "Applicants must submit a detailed project report.",
            "Loan amount can range from ₹2 crores to ₹100 crores."
        ],
        website: "https://agricoop.nic.in"
    },
    {
        name: "National Disaster Management Authority (NDMA)",
        purpose: "Supervises disaster management efforts in India, including agriculture.",
        eligibility: "Applicable to all farmers affected by disasters.",
        price: "Funding varies based on disaster response needs.",
        rules: [
            "Farmers must follow guidelines issued by NDMA.",
            "Participation in training programs is encouraged."
        ],
        website: "https://ndma.gov.in"
    }
];

document.addEventListener('DOMContentLoaded', () => {
    const disschemes = document.getElementById('disschemes');

    // Assuming 'schemes' is an array of scheme objects
    const topThreeSchemes = disasterManagementSchemes.slice(0, 3);

    // Populate the top three schemes
    topThreeSchemes.forEach(disasterManagementSchemes => {
        const schemeDiv = document.createElement('div');
        schemeDiv.classList.add('scheme');
        schemeDiv.innerHTML = `
            <img src="./drought-780088_1280.jpg" alt="${disasterManagementSchemes.name}">
            <a href="${disasterManagementSchemes.website}" target="_blank">${disasterManagementSchemes.name}</a>
            <p><strong>Purpose:</strong> ${disasterManagementSchemes.purpose}</p>
            <p><strong>Eligibility:</strong> ${disasterManagementSchemes.eligibility}</p>
            <p><strong>Price:</strong> ${disasterManagementSchemes.price}</p>
            <h3>Rules</h3>
            <p>${disasterManagementSchemes.rules.join(', ')}</p>`;

            disschemes.appendChild(schemeDiv);
    });
});

// disastermanagement.html
document.addEventListener('DOMContentLoaded', () => {
    const disschemesdiv = document.getElementById('disschemesdiv');

    // Check if the govtschemes element exists before populating
    if (disschemesdiv) {
        disasterManagementSchemes.forEach(scheme => {
            const schemeDiv = document.createElement('div');
            schemeDiv.classList.add('scheme');
            schemeDiv.innerHTML = `
                <img src="./drought-780088_1280.jpg" alt="${scheme.name}">
                <a href="${scheme.website}" target="_blank">${scheme.name}</a>
                <p><strong>Purpose:</strong> ${scheme.purpose}</p>
                <p><strong>Eligibility:</strong> ${scheme.eligibility}</p>
                <p><strong>Price:</strong> ${scheme.price}</p>
                <h3>Rules</h3>
                <p>${scheme.rules.join(', ')}</p>`;

                disschemesdiv.appendChild(schemeDiv);
        });
    }
});

