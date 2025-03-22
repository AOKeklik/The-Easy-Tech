import CaseStudy from "@/components/CaseStudy/CaseStudy"
import NavBottom from "@/components/Header/NavBottom/NavBottom"
import NavTop from "@/components/Header/NavTop/NavTop"
import PaymentGateway from "@/components/PaymentGateway/PaymentGateway"
import Service from "@/components/Service/Service"
import Slider from "@/components/Slider/Slider"

import services from "@/data/service.json"
import casestudies from "@/data/case-study.json"
import PaymentGatewayService from "@/components/PaymentGatewayService/PaymentGatewayService"

export default function Home() {
    return (
        <div>
            <header id="header">
                <NavTop />
                <NavBottom />
            </header>

            <main className="content">
                <Slider />
                <Service services={services} />
                <PaymentGateway />
                <CaseStudy casestudies={casestudies} />
                <PaymentGatewayService />
            </main>
        </div>
    )
}
