import NavBottom from "@/components/Header/NavBottom/NavBottom"
import NavTop from "@/components/Header/NavTop/NavTop"
import PaymentGateway from "@/components/PaymentGateway/PaymentGateway"
import Service from "@/components/Service/Service"
import Slider from "@/components/Slider/Slider"

import services from "@/data/service.json"

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
            </main>
        </div>
    )
}
